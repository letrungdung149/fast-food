/*
 Highstock JS v9.0.0 (2021-02-02)

 Indicator series type for Highstock

 (c) 2010-2019 Kamil Kulig

 License: www.highcharts.com/license
*/
(function(e){"object"===typeof module&&module.exports?(e["default"]=e,module.exports=e):"function"===typeof define&&define.amd?define("highcharts/indicators/regressions",["highcharts","highcharts/modules/stock"],function(h){e(h);e.Highcharts=h;return e}):e("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(e){function h(e,d,g,f){e.hasOwnProperty(d)||(e[d]=f.apply(null,g))}e=e?e._modules:{};h(e,"Stock/Indicators/LinearRegression/LinearRegression.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],
function(e,d){var g=this&&this.__extends||function(){var c=function(a,b){c=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(b,a){b.__proto__=a}||function(b,a){for(var m in a)a.hasOwnProperty(m)&&(b[m]=a[m])};return c(a,b)};return function(a,b){function m(){this.constructor=a}c(a,b);a.prototype=null===b?Object.create(b):(m.prototype=b.prototype,new m)}}(),f=e.seriesTypes.sma,h=d.isArray,k=d.extend,l=d.merge;d=function(c){function a(){var b=null!==c&&c.apply(this,arguments)||this;b.data=
void 0;b.options=void 0;b.points=void 0;return b}g(a,c);a.prototype.getRegressionLineParameters=function(b,a){var m=this.options.params.index,c=function(b,a){return h(b)?b[a]:b},d=b.reduce(function(b,a){return a+b},0),e=a.reduce(function(b,a){return c(a,m)+b},0);d/=b.length;e/=a.length;var l=0,f=0,k;for(k=0;k<b.length;k++){var g=b[k]-d;var n=c(a[k],m)-e;l+=g*n;f+=Math.pow(g,2)}b=f?l/f:0;return{slope:b,intercept:e-b*d}};a.prototype.getEndPointY=function(b,a){return b.slope*a+b.intercept};a.prototype.transformXData=
function(b,a){var c=b[0];return b.map(function(b){return(b-c)/a})};a.prototype.findClosestDistance=function(b){var a,c;for(c=1;c<b.length-1;c++){var d=b[c]-b[c-1];0<d&&("undefined"===typeof a||d<a)&&(a=d)}return a};a.prototype.getValues=function(a,c){var b=a.xData;a=a.yData;c=c.period;var d,e={xData:[],yData:[],values:[]},m=this.options.params.xAxisUnit||this.findClosestDistance(b);for(d=c-1;d<=b.length-1;d++){var l=d-c+1;var f=d+1;var k=b[d];var g=b.slice(l,f);l=a.slice(l,f);f=this.transformXData(g,
m);g=this.getRegressionLineParameters(f,l);l=this.getEndPointY(g,f[f.length-1]);e.values.push({regressionLineParameters:g,x:k,y:l});e.xData.push(k);e.yData.push(l)}return e};a.defaultOptions=l(f.defaultOptions,{params:{xAxisUnit:void 0},tooltip:{valueDecimals:4}});return a}(f);k(d.prototype,{nameBase:"Linear Regression Indicator"});e.registerSeriesType("linearRegression",d);"";return d});h(e,"Stock/Indicators/LinearRegressionSlopes/LinearRegressionSlopes.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],
function(e,d){var g=this&&this.__extends||function(){var d=function(c,a){d=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,c){a.__proto__=c}||function(a,c){for(var b in c)c.hasOwnProperty(b)&&(a[b]=c[b])};return d(c,a)};return function(c,a){function b(){this.constructor=c}d(c,a);c.prototype=null===a?Object.create(a):(b.prototype=a.prototype,new b)}}(),f=e.seriesTypes.linearRegression,k=d.extend,h=d.merge;d=function(d){function c(){var a=null!==d&&d.apply(this,arguments)||this;a.data=
void 0;a.options=void 0;a.points=void 0;return a}g(c,d);c.prototype.getEndPointY=function(a){return a.slope};c.defaultOptions=h(f.defaultOptions);return c}(f);k(d.prototype,{nameBase:"Linear Regression Slope Indicator"});e.registerSeriesType("linearRegressionSlope",d);"";return d});h(e,"Stock/Indicators/LinearRegressionIntercept/LinearRegressionIntercept.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d){var g=this&&this.__extends||function(){var d=function(c,a){d=Object.setPrototypeOf||
{__proto__:[]}instanceof Array&&function(a,c){a.__proto__=c}||function(a,c){for(var b in c)c.hasOwnProperty(b)&&(a[b]=c[b])};return d(c,a)};return function(c,a){function b(){this.constructor=c}d(c,a);c.prototype=null===a?Object.create(a):(b.prototype=a.prototype,new b)}}(),f=e.seriesTypes.linearRegression,k=d.extend,h=d.merge;d=function(d){function c(){var a=null!==d&&d.apply(this,arguments)||this;a.data=void 0;a.options=void 0;a.points=void 0;return a}g(c,d);c.prototype.getEndPointY=function(a){return a.intercept};
c.defaultOptions=h(f.defaultOptions);return c}(f);k(d.prototype,{nameBase:"Linear Regression Intercept Indicator"});e.registerSeriesType("linearRegressionIntercept",d);"";return d});h(e,"Stock/Indicators/LinearRegressionAngle/LinearRegressionAngle.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d){var g=this&&this.__extends||function(){var c=function(a,b){c=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,b){a.__proto__=b}||function(a,b){for(var c in b)b.hasOwnProperty(c)&&
(a[c]=b[c])};return c(a,b)};return function(a,b){function d(){this.constructor=a}c(a,b);a.prototype=null===b?Object.create(b):(d.prototype=b.prototype,new d)}}(),f=e.seriesTypes,h=f.sma,k=d.extend,l=d.merge;d=function(c){function a(){var a=null!==c&&c.apply(this,arguments)||this;a.data=void 0;a.options=void 0;a.points=void 0;return a}g(a,c);a.prototype.slopeToAngle=function(a){return 180/Math.PI*Math.atan(a)};a.prototype.getEndPointY=function(a){return this.slopeToAngle(a.slope)};a.defaultOptions=
l(h.defaultOptions,{tooltip:{pointFormat:'<span style="color:{point.color}">\u25cf</span>{series.name}: <b>{point.y}\u00b0</b><br/>'}});return a}(f.linearRegression);k(d.prototype,{nameBase:"Linear Regression Angle Indicator"});e.registerSeriesType("linearRegressionAngle",d);"";return d});h(e,"masters/indicators/regressions.src.js",[],function(){})});
//# sourceMappingURL=regressions.js.map