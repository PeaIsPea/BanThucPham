$(document).ready(function () {
    thongke1();
    var char = new Morris.Area({
        element: "chart1",
        xkey: "date1",
        ykeys: ["order1", "sales1"],
        labels: ["Đơn hàng", "Doanh thu"],
    });
    function thongke1() {
        $.ajax({
            url: "modules/statistical_tables/thongkenam.php",
            dataType: "json",
            success: function (data1) {
                char.setData(data1);
            },
        });
    }
});
$(document).ready(function () {
    thongke2();
    var char = new Morris.Line({
        element: "chart2",
        xkey: "date2",
        ykeys: ["order2", "sales2"],
        labels: ["Đơn hàng", "Doanh thu"],
    });
    function thongke2() {
        $.ajax({
            url: "modules/statistical_tables/thongkethang.php",
            dataType: "json",
            success: function (data2) {
                char.setData(data2);
            },
        });
    }
});

$(document).ready(function () {
    thongke3();
    var char = new Morris.Bar({
        element: "chart3",
        xkey: "date3",
        ykeys: ["order3", "sales3"],
        labels: ["Đơn hàng", "Doanh thu"],
    });
    function thongke3() {
        $.ajax({
            url: "modules/statistical_tables/thongketuan.php",
            dataType: "json",
            success: function (data3) {
                char.setData(data3);
            },
        });
    }
});
