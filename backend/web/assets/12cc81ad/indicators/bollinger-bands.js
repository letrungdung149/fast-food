/*
 Highstock JS v9.0.0 (2021-02-02)

 Indicator series type for Highstock

 (c) 2010-2019 Pawe Fus

 License: www.highcharts.com/license
*/
(function(a){"object"===typeof module&&module.exports?(a["default"]=a,module.exports=a):"function"===typeof define&&define.amd?define("highcharts/indicators/bollinger-bands",["highcharts","highcharts/modules/stock"],function(d){a(d);a.Highcharts=d;return a}):a("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(a){function d(a,f,e,d){a.hasOwnProperty(f)||(a[f]=d.apply(null,e))}a=a?a._modules:{};d(a,"Mixins/MultipleLines.js",[a["Core/Globals.js"],a["Core/Utilities.js"]],function(a,f){var e=
f.defined,d=f.error,x=f.merge,h=a.seriesTypes.sma;return{pointArrayMap:["top","bottom"],pointValKey:"top",linesApiNames:["bottomLine"],getTranslatedLinesNames:function(m){var a=[];(this.pointArrayMap||[]).forEach(function(b){b!==m&&a.push("plot"+b.charAt(0).toUpperCase()+b.slice(1))});return a},toYData:function(m){var a=[];(this.pointArrayMap||[]).forEach(function(b){a.push(m[b])});return a},translate:function(){var a=this,d=a.pointArrayMap,b=[],g;b=a.getTranslatedLinesNames();h.prototype.translate.apply(a,
arguments);a.points.forEach(function(c){d.forEach(function(m,y){g=c[m];null!==g&&(c[b[y]]=a.yAxis.toPixels(g,!0))})})},drawGraph:function(){var a=this,f=a.linesApiNames,b=a.points,g=b.length,c=a.options,B=a.graph,y={options:{gapSize:c.gapSize}},u=[],t;a.getTranslatedLinesNames(a.pointValKey).forEach(function(a,c){for(u[c]=[];g--;)t=b[g],u[c].push({x:t.x,plotX:t.plotX,plotY:t[a],isNull:!e(t[a])});g=b.length});f.forEach(function(b,g){u[g]?(a.points=u[g],c[b]?a.options=x(c[b].styles,y):d('Error: "There is no '+
b+' in DOCS options declared. Check if linesApiNames are consistent with your DOCS line names." at mixin/multiple-line.js:34'),a.graph=a["graph"+b],h.prototype.drawGraph.call(a),a["graph"+b]=a.graph):d('Error: "'+b+" doesn't have equivalent in pointArrayMap. To many elements in linesApiNames relative to pointArrayMap.\"")});a.points=b;a.options=c;a.graph=B;h.prototype.drawGraph.call(a)}}});d(a,"Stock/Indicators/BB/BBIndicator.js",[a["Mixins/MultipleLines.js"],a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],
function(a,d,e){var f=this&&this.__extends||function(){var a=function(b,c){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,c){a.__proto__=c}||function(a,c){for(var b in c)c.hasOwnProperty(b)&&(a[b]=c[b])};return a(b,c)};return function(b,c){function d(){this.constructor=b}a(b,c);b.prototype=null===c?Object.create(c):(d.prototype=c.prototype,new d)}}(),q=d.seriesTypes.sma,h=e.extend,m=e.isArray,r=e.merge;e=function(a){function b(){var b=null!==a&&a.apply(this,arguments)||this;b.data=
void 0;b.options=void 0;b.points=void 0;return b}f(b,a);b.prototype.init=function(){d.seriesTypes.sma.prototype.init.apply(this,arguments);this.options=r({topLine:{styles:{lineColor:this.color}},bottomLine:{styles:{lineColor:this.color}}},this.options)};b.prototype.getValues=function(a,b){var c=b.period,e=b.standardDeviation,f=a.xData,g=(a=a.yData)?a.length:0,h=[],q=[],r=[],n;if(!(f.length<c)){var x=m(a[0]);for(n=c;n<=g;n++){var v=f.slice(n-c,n);var p=a.slice(n-c,n);var k=d.seriesTypes.sma.prototype.getValues.call(this,
{xData:v,yData:p},b);v=k.xData[0];k=k.yData[0];for(var z=0,A=p.length,w=0;w<A;w++){var l=(x?p[w][b.index]:p[w])-k;z+=l*l}l=Math.sqrt(z/(A-1));p=k+e*l;l=k-e*l;h.push([v,p,k,l]);q.push(v);r.push([p,k,l])}return{values:h,xData:q,yData:r}}};b.defaultOptions=r(q.defaultOptions,{params:{period:20,standardDeviation:2,index:3},bottomLine:{styles:{lineWidth:1,lineColor:void 0}},topLine:{styles:{lineWidth:1,lineColor:void 0}},tooltip:{pointFormat:'<span style="color:{point.color}">\u25cf</span><b> {series.name}</b><br/>Top: {point.top}<br/>Middle: {point.middle}<br/>Bottom: {point.bottom}<br/>'},
marker:{enabled:!1},dataGrouping:{approximation:"averages"}});return b}(q);h(e.prototype,{pointArrayMap:["top","middle","bottom"],pointValKey:"middle",nameComponents:["period","standardDeviation"],linesApiNames:["topLine","bottomLine"],drawGraph:a.drawGraph,getTranslatedLinesNames:a.getTranslatedLinesNames,translate:a.translate,toYData:a.toYData});d.registerSeriesType("bb",e);"";return e});d(a,"masters/indicators/bollinger-bands.src.js",[],function(){})});
//# sourceMappingURL=bollinger-bands.js.map