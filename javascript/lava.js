var lava = {
  charts            : [],
  dashboards        : [],
  registeredCharts  : [],
  registeredActions : [],
  readyCallback     : function(){},

  Chart: function() {
    this.render  = null;
    this.setData = null;
    this.redraw  = null;
    this.data    = null;
    this.chart   = null;
    this.options = null;
    this.formats = [];
  },
  
  Dashboard: function() {
    this.render    = null;
    this.data      = null;
    this.bindings  = [];
    this.dashboard = null;
    this.callbacks = [];
  },
  
  Callback: function (label, func) {
    this.label = label;
    this.func  = func;
  },

  ready: function (callback) { 
    lava.readyCallback = callback;
  },
/*
  action: function (label) {
    lava.registeredActions[label] = 
  },
*/
  event: function (event, chart, callback) {
    return callback(event, chart);
  },

  registerChart: function(type, label) {
    this.registeredCharts.push(type + ':' + label);
  },

  loadData: function (chartLabel, dataTableJson, callback) {
    lava.getChart(chartLabel, function (chart, lavachart) {
      lavachart.setData(dataTableJson);
      lavachart.redraw();
      
      return callback(lavachart.chart);
    });
  },

  getDashboard: function (label, callback) {
    if (typeof lava.dashboards[label] === 'undefined') {
      throw new Error('[Lavacharts] Dashboard "' + label + '" was not found.');
    }

    var lavaDashboard = lava.dashboards[label];

    callback(lavaDashboard.dashboard, lavaDashboard);
  },

  getChart: function (chartLabel, callback) {
    var chartTypes = Object.keys(lava.charts);
    var LavaChart;

    var search = chartTypes.some(function (type) {
      if (typeof lava.charts[type][chartLabel] !== 'undefined') {
        LavaChart = lava.charts[type][chartLabel];

        return true;
      } else {
        return false;
      }
    });

    if (search === false) {
      throw new Error('[Lavacharts] Chart "' + chartLabel + '" was not found.');
    } else {
      callback(LavaChart.chart, LavaChart);
    }
  },

  redrawCharts: function() {
    var timer, delay = 300;

    clearTimeout(timer);

    timer = setTimeout(function() {
      for(var c = 0; c < lava.registeredCharts.length; c++) {
        var parts = lava.registeredCharts[c].split(':');

        lava.charts[parts[0]][parts[1]].redraw();
      }
    }, delay);
  }
};

window.addEventListener("resize", window.lava.redrawCharts);
