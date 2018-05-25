$(document).ready(function () {
    //initials
    $('form').attr('autocomplete', 'off');
    $(document).attr('cache','false');

    // Auto Complete Box From Database
    //route search

    var nowWhat; // route, point, day

    $('#route').click(function () {
        var key = $(this).val();
        var db_tbl = "tbl_route";
        var row = "route";
        /*if (key != '') {*/
        $.ajax({
            url: "check/checkAutoSearchResult.php",
            method: "POST",
            data: {keyName: key, tblName: db_tbl, rowName: row},
            //cache: false,
            //history: false,
            success: function (data) {
                $('#showroute').fadeIn();
                $('#showroute').html(data);

                nowWhat = "route";
            }
        });
        /*} else {
            $('#showroute').fadeOut();
        }*/
        //});

        // $(document).on('click', 'li', function(){
        // 	$('#route').val($(this).text());
        // 	$('#showresult').fadeOut();
        // 	//return false;
        // });

        return false;
    });


    //point search
    $('#point').click(function () {
        var key = $('#route').val();

        if(key){
            //var key = $(this).val();
            var db_tbl = "tbl_point";
            var row = "point";
            /*if (key != '') {*/
            $.ajax({
                url: "check/checkAutoSearch.php",
                method: "POST",
                data: {keyName: key, tblName: db_tbl, rowName: row},
                cache: false,
                //history: false,
                success: function (data) {
                    $('#showpoint').fadeIn();
                    $('#showpoint').html(data);

                    //nowWhat = "point";
                }
            });
            /*} else {
                $('#showpoint').fadeOut();
            }*/

            //});


            // $(document).on('click', 'li', function(){
            // 	$('#point').val($(this).text());
            // 	$('#showresult').fadeOut();
            // 	//return false;
            // });
        }else{
            $('#insertionStatus').fadeIn();
            $('#insertionStatus').html('<span class=\'error\'>Please Select Route First!</span>');
            setInterval(function () {
                $("#insertionStatus").fadeOut();
                /*$("#insertionStatus").html('');*/
            }, 3000);

        }

        return false;
    });

    $('#routepoint').click(function () {
        var key = $('#route').val();

        if(key){
            //var key = $(this).val();
            var db_tbl = "tbl_route";
            var row = "route";
            /*if (key != '') {*/
            $.ajax({
                url: "check/checkPointSearch.php",
                method: "POST",
                data: {keyName: key, tblName: db_tbl, rowName: row},
                //cache: false,
                //history: false,
                success: function (data) {
                    $('#showroutepoint').fadeIn();
                    $('#showroutepoint').html(data);
                    nowWhat = "point";
                }
            });
            /*} else {
                $('#showpoint').fadeOut();
            }*/

            //});


            // $(document).on('click', 'li', function(){
            // 	$('#point').val($(this).text());
            // 	$('#showresult').fadeOut();
            // 	//return false;
            // });
        }else{
            $('#insertionStatus').fadeIn();
            $('#insertionStatus').html('<span class=\'error\'>Please Select Route First!</span>');
            setInterval(function () {
                $("#insertionStatus").fadeOut();
                /*$("#insertionStatus").html('');*/
            }, 3000);

        }

        return false;
    });


    // day search

    $('#day').click(function () {
        var key = $(this).val();
        var db_tbl = "tbl_day";
        var row = "day";
        /*if (key != '') {*/
        $.ajax({
            url: "check/checkAutoSearchResult.php",
            method: "POST",
            data: {keyName: key, tblName: db_tbl, rowName: row},
            //cache: false,
            //autosuggestion: false,
            //select: false,
            success: function (data) {
                $('#showdays').fadeIn();
                $('#showdays').html(data);

                nowWhat = "day";
            }
        });
        /* } else {
             $('#showdays').fadeOut();
         }*/

        //});


        // $(document).on('click', 'li', function(){
        // 	$("#day").val($(this).text());
        // 	$('#showresult').fadeOut();

        // 	return false;
        // });
        return false;
    });

    $(document).on('click', 'ss', function () {
        if (nowWhat == "route") {

            $('#route').val($(this).text());
            $('#showroute').fadeOut();
        } else if (nowWhat == "point") {

            $('#routepoint').val($(this).text());
            $('#showroutepoint').fadeOut();
        } else {

            $('#day').val($(this).text());
            $('#showdays').fadeOut();
        }
        nowWhat ='';


        //return false;
    });


    //Insert Data

    //route Insert
    $('#routesubmit').click(function () {
        var content = $("#addroute").val();
        var tbl = 'tbl_route';
        var row = 'route';
        //if($.trim(content)!= ''){
        $.ajax({
            url: "check/insertSingleData.php",
            method: "POST",
            data: {value: content, tblName: tbl, rowName: row},
            dataType: "text",
            success: function (data) {
                $("#addroute").val("");
                $("#insertionStatus").fadeIn();
                $("#insertionStatus").html(data);
               setInterval(function () {
                    $("#insertionStatus").fadeOut();
                    /*$("#insertionStatus").html('');*/
                }, 3000);
            }
        });
        return false;
        //}
    });
    $('#addroute').show(function RouteShow() {
        //var content = $("#addroute").val();
        var tbl = 'tbl_route';
        var row = 'route';
        $.ajax({
            url: "check/getRefresh.php",
            method: "POST",
            data: {tblName: tbl, rowName: row},
            dataType: "text",
            success: function (data) {
                $('#showroute').fadeIn();
                $('#showroute').html(data);
            }
        });
        setInterval(function () {
            RouteShow();
        }, 2000);
        return false;
    });


    //point insert
    $('#pointsubmit').click(function () {
        var content1 = $("#route").val();
        var content = $("#addpoint").val();
        var tbl = 'tbl_point';
        var row = 'point';
        var row1 = 'routeid';
        //if($.trim(content)!= ''){
        $.ajax({
            url: "check/insertPointData.php",
            method: "POST",
            data: {value: content, value1: content1, tblName: tbl, rowName: row, rowName1: row1},
            dataType: "text",
            success: function (data) {
                $("#addpoint").val("");
                $("#route").val("");
                $("#insertionStatus").html(data);
                setInterval(function () {
                    $("#insertionStatus").fadeOut();
                    /*$("#insertionStatus").html('');*/
                }, 3000);
            }
        });

        return false;
        //}
    });


    $('#addpoint').show(function PointShow() {
        //var content = $("#addpoint").val();
        var tbl = 'tbl_point';
        var row = 'point';
        //if(content!=''){
        $.ajax({
            /*url:"check/checkAutoSearchResult.php",
            method:"POST",
            data: {keyName:content, tblName:tbl, rowName:row},*/
            url: "check/getRefresh.php",
            method: "POST",
            data: {tblName: tbl, rowName: row},
            dataType: "text",
            success: function (data) {
                $('#showpoint').fadeIn();
                $('#showpoint').html(data);
            }
        });
        /*}else{
            $('#showpoint').fadeOut();*/

        //}
        setInterval(function () {
            PointShow();

        },2000);

        return false;
    });
    $('#studentsubmit').click(function () {
        var route = $("#route").val();
        var point = $("#routepoint").val();
        var day = $("#day").val();
        var tbl = 'tbl_bus';
        $.ajax({
            url: "check/insertBusNo.php",
            method: "POST",
            data: {tbl: tbl, point: point, route: route, day: day},
            dataType: "text",
            success: function (data) {
                $("#route").val("");
                $("#routepoint").val("");
                $("#day").val("");
                $('#insertionStatus').fadeIn();
                $('#insertionStatus').html(data);
                setInterval(function () {
                    $("#insertionStatus").fadeOut();
                    /*$("#insertionStatus").html('');*/
                }, 3000);
            }
        });

        return false;
    });


    $('#businfo').click(function () {
        $.ajax({
            url: "check/getBusInfo.php",
            method: "POST",
            dataType: "text",
            success: function (data) {
                $('#busresult').fadeIn();
                $('#busresult').html(data);
            }
        });

        return false;
    });


    $(document).on('click','#okbutton', function () {
        $('#busresult').fadeOut('');
        //$('#busresult').html('');

    });

    $('#addpicktime').show(function PickUpTimeShow() {
        //var content = $("#addroute").val();
        var tbl = 'tbl_pickuptime';
        var row = 'pickuptime';
        $.ajax({
            url: "check/getRefresh.php",
            method: "POST",
            data: {tblName: tbl, rowName: row},
            dataType: "text",
            success: function (data) {
                $('#showpicktime').fadeIn();
                $('#showpicktime').html(data);
            }
        });
        setInterval(function () {
            PickUpTimeShow();
        }, 2000);
        return false;
    });


    $('#picktimesubmit').click(function () {

        var content = $("#addpicktime").val();
        //alert(content);
        var tbl = 'tbl_pickuptime';
        var row = 'pickuptime';
        //if($.trim(content)!= ''){
        $.ajax({
            url: "check/insertSingleData.php",
            method: "POST",
            data: {value: content, tblName: tbl, rowName: row},
            dataType: "text",
            success: function (data) {
                $("#addpicktime").val("");
                $("#insertionStatus").fadeIn();
                $("#insertionStatus").html(data);
                setInterval(function () {
                    $("#insertionStatus").fadeOut();
                    /*$("#insertionStatus").html('');*/
                }, 3000);
            }
        });

        return false;
    });
    $('#adddroppoint').show(function DropTimeShow() {
        //var content = $("#addroute").val();
        var tbl = 'tbl_droptime';
        var row = 'droptime';
        $.ajax({
            url: "check/getRefresh.php",
            method: "POST",
            data: {tblName: tbl, rowName: row},
            dataType: "text",
            success: function (data) {
                $('#showdroptime').fadeIn();
                $('#showdroptime').html(data);
            }
        });
        setInterval(function () {
            DropTimeShow();
        }, 2000);
        return false;
    });


    $('#droptimesubmit').click(function () {

        var content = $("#adddroppoint").val();
        //alert(content);
        var tbl = 'tbl_droptime';
        var row = 'droptime';
        //if($.trim(content)!= ''){
        $.ajax({
            url: "check/insertSingleData.php",
            method: "POST",
            data: {value: content, tblName: tbl, rowName: row},
            dataType: "text",
            success: function (data) {
                $("#adddroppoint").val("");
                $("#insertionStatus").fadeIn();
                $("#insertionStatus").html(data);
                setInterval(function () {
                    $("#insertionStatus").fadeOut();
                    /*$("#insertionStatus").html('');*/
                }, 3000);
            }
        });

        return false;
    });




    /*$(document).on('click', 'ss', function () {
        var val = $(this).text();
        $.ajax({
            url: "check/getRouteDetails.php",
            method: "POST",
            dataType: "text",
            success: function (data) {
                $('#busresult').fadeIn();
                $('#busresult').html(data);
            }
        });

        return false;

    });*/


    //Live Data Search
    /*$('#liveSearch').keyup(function(){
        var searchData = $(this).val();
        if(searchData != ''){
            $.ajax({
                url:'check/checkSearch.php',
                method:"POST",
                data:{searchLive:searchData},
                dataType:"text",
                success: function(data){
                    $('#searchStatus').html(data);

                }
            });
        }else{
            $('#searchStatus').html("");

        }

    });*/


    //check user availability

    /*$('#username').blur(function(){
        var username = $(this).val();
        $.ajax({
            url:"check/checkuser.php",
            method:"POST",
            data: {username:username},
            dataType: "text",

            success: function (data){
                $('#userstatus').html(data);
            }
        });
    });

    */
    //show password button

    /*$("#showpass").on('click', function(){
        var pass = $("#password");
        var fieldtype = pass.attr('type');
        if(fieldtype=="password"){
            pass.attr('type','text');
            $(this).text("Hide Password");

        }else{
            pass.attr('type','password');
            $(this).text("Show Password");
        }
    });
    */


    //Auto Data Save

    /*$('#content').keyup( function(){
        var content =  $("#content").val();
        var contentid =  $("#contentid").val();

        if(content != ''){
            $.ajax({
                url:'check/checkAutoSave.php',
                method:"POST",
                data:{contentName:content, contentId:contentid},
                dataType:"text",
                success: function(data){
                    if(data){
                        $("#contentid").val(data);
                    }

                    $('#contentStatus').text("Data Save Automatically...");
                    setInterval(function(){
                        $('#contentStatus').text("");
                    },2000);
                }
            });
        }
    }); */


});  