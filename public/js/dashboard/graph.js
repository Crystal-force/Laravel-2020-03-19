"use strict";
var mchart;
var achart;
var MoneyCharts = function() {
    return {
        init: function() {
            AmCharts.makeChart("kt_amcharts_1", {
                rtl: KTUtil.isRTL(),
                type: "serial",
                theme: "light",
                dataProvider: [ {
                    country: "Brazil",
                    visits: 395
                }],
                valueAxes: [{
                    gridColor: "#FFFFFF",
                    gridAlpha: .2,
                    dashLength: 0
                }],
                gridAboveGraphs: !0,
                startDuration: 1,
                graphs: [{
                    balloonText: "[[category]]: <b>[[value]]</b>",
                    fillAlphas: .8,
                    lineAlpha: .2,
                    type: "column",
                    valueField: "visits"
                }],
                chartCursor: {
                    categoryBalloonEnabled: !1,
                    cursorAlpha: 0,
                    zoomable: !1
                },
                categoryField: "country",
                categoryAxis: {
                    gridPosition: "start",
                    gridAlpha: 0,
                    tickPosition: "start",
                    tickLength: 20
                },
                export: {
                    enabled: !0
                }
            }),
             function() {
                mchart = AmCharts.makeChart("moneychart", {
                    type: "serial",
                    theme: "light",
                    marginRight: 10,
                    marginLeft: 10,
                    autoMarginOffset: 20,
                    mouseWheelZoomEnabled: !0,
                    hideCredits:true,
                    dataDateFormat: "YYYY-MM-DD",
                    valueAxes: [{
                        id: "v1",
                        axisAlpha: 0,
                        position: "left",
                        ignoreAxisWidth: !0
                    }],
                    balloon: {
                        borderThickness: 1,
                        shadowAlpha: 0
                    },
                    graphs: [{
                        id: "g1",
                        balloon: {
                            drop: !0,
                            adjustBorderColor: !1,
                            color: "#ffffff"
                        },
                        bullet: "round",
                        bulletBorderAlpha: 1,
                        bulletColor: "#FFFFFF",
                        bulletSize: 5,
                        hideBulletsCount: 50,
                        lineThickness: 2,
                        title: "red line",
                        useLineColorForBulletBorder: !0,
                        valueField: "value",
                        balloonText: "<span style='font-size:18px;'>[[value]]</span>"
                    }],
                    chartScrollbar: {
                        graph: "g1",
                        oppositeAxis: !1,
                        offset: 30,
                        scrollbarHeight: 80,
                        backgroundAlpha: 0,
                        selectedBackgroundAlpha: .1,
                        selectedBackgroundColor: "#888888",
                        graphFillAlpha: 0,
                        graphLineAlpha: .5,
                        selectedGraphFillAlpha: 0,
                        selectedGraphLineAlpha: 1,
                        autoGridCount: !0,
                        color: "#AAAAAA"
                    },
                    chartCursor: {
                        pan: !0,
                        valueLineEnabled: !0,
                        valueLineBalloonEnabled: !0,
                        cursorAlpha: 1,
                        cursorColor: "#258cbb",
                        limitToGraph: "g1",
                        valueLineAlpha: .2,
                        valueZoomable: !0
                    },
                    valueScrollbar: {
                        oppositeAxis: !1,
                        offset: 50,
                        scrollbarHeight: 10
                    },
                    categoryField: "date",
                    categoryAxis: {
                        parseDates: !0,
                        dashLength: 1,
                        minorGridEnabled: !0
                    },
                    export: {
                        enabled: !0
                    },
                    dataProvider: [ {
                        date: "2013-01-30",
                        value: 34
                    }]
                });
                function a() {
                    mchart.zoomToIndexes(mchart.dataProvider.length - 40, mchart.dataProvider.length - 1)
                }
                mchart.addListener("rendered", a),
                a()
            }()
        }
    }
}();
var AdsCharts = function() {
    return {
        init: function() {
            AmCharts.makeChart("kt_amcharts_1", {
                rtl: KTUtil.isRTL(),
                type: "serial",
                theme: "light",
                dataProvider: [ {
                    country: "Brazil",
                    visits: 395
                }],
                valueAxes: [{
                    gridColor: "#FFFFFF",
                    gridAlpha: .2,
                    dashLength: 0
                }],
                gridAboveGraphs: !0,
                startDuration: 1,
                graphs: [{
                    balloonText: "[[category]]: <b>[[value]]</b>",
                    fillAlphas: .8,
                    lineAlpha: .2,
                    type: "column",
                    valueField: "visits"
                }],
                chartCursor: {
                    categoryBalloonEnabled: !1,
                    cursorAlpha: 0,
                    zoomable: !1
                },
                categoryField: "country",
                categoryAxis: {
                    gridPosition: "start",
                    gridAlpha: 0,
                    tickPosition: "start",
                    tickLength: 20
                },
                export: {
                    enabled: !0
                }
            }),
             function() {
                achart = AmCharts.makeChart("adschart", {
                    type: "serial",
                    theme: "light",
                    marginRight: 10,
                    marginLeft: 10,
                    autoMarginOffset: 20,
                    mouseWheelZoomEnabled: !0,
                    dataDateFormat: "YYYY-MM-DD",
                    hideCredits:true,
                    valueAxes: [{
                        id: "v1",
                        axisAlpha: 0,
                        position: "left",
                        ignoreAxisWidth: !0
                    }],
                    balloon: {
                        borderThickness: 1,
                        shadowAlpha: 0
                    },
                    graphs: [{
                        id: "g1",
                        balloon: {
                            drop: !0,
                            adjustBorderColor: !1,
                            color: "#ffffff"
                        },
                        bullet: "round",
                        bulletBorderAlpha: 1,
                        bulletColor: "#FFFFFF",
                        bulletSize: 5,
                        hideBulletsCount: 50,
                        lineThickness: 2,
                        title: "red line",
                        useLineColorForBulletBorder: !0,
                        valueField: "value",
                        balloonText: "<span style='font-size:18px;'>[[value]]</span>"
                    }],
                    chartScrollbar: {
                        graph: "g1",
                        oppositeAxis: !1,
                        offset: 30,
                        scrollbarHeight: 80,
                        backgroundAlpha: 0,
                        selectedBackgroundAlpha: .1,
                        selectedBackgroundColor: "#888888",
                        graphFillAlpha: 0,
                        graphLineAlpha: .5,
                        selectedGraphFillAlpha: 0,
                        selectedGraphLineAlpha: 1,
                        autoGridCount: !0,
                        color: "#AAAAAA"
                    },
                    chartCursor: {
                        pan: !0,
                        valueLineEnabled: !0,
                        valueLineBalloonEnabled: !0,
                        cursorAlpha: 1,
                        cursorColor: "#258cbb",
                        limitToGraph: "g1",
                        valueLineAlpha: .2,
                        valueZoomable: !0
                    },
                    valueScrollbar: {
                        oppositeAxis: !1,
                        offset: 50,
                        scrollbarHeight: 10
                    },
                    categoryField: "date",
                    categoryAxis: {
                        parseDates: !0,
                        dashLength: 1,
                        minorGridEnabled: !0
                    },
                    export: {
                        enabled: !0
                    },
                    dataProvider: [ {
                        date: "2013-01-30",
                        value: 34
                    }]
                });
                function a() {
                    achart.zoomToIndexes(achart.dataProvider.length - 40, achart.dataProvider.length - 1)
                }
                achart.addListener("rendered", a),
                a()
            }()
        }
    }
}();

