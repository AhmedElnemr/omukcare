function doJquryCode(){
    $('.datepicker').datetimepicker({
        format:'Y-m-d',
        time: false
    });
   // $('.selectpicker').selectpicker("refresh");
    console.log("go1");
    $("#country-ids").on("change",function () {
        console.log("go");
        if($(this).val() != ""){
            var url = baseUrl+'/JsControl/getCity/'+$(this).val();
             console.log(url)
            $.ajax({
                type:'get',
                url: url,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#city-ids").html(html);
                    //$('#city-ids').selectpicker("refresh");
                },
                error:function(error){
                    console.log(error.responseText);
                }
            });
        }
    });
    $('.dropify').dropify();
    $('.multi-up').imageuploadify();
    $( "#addGallary" ).click(function() {
    $( "#add-gallary" ).toggle();
    });
}


$(function() {
    // validte user nane or uniqe coulomn
    $(".unique-field").keyup(function () {
        //    unique-field     field-name=""   data-db=""
        // var total_url = window.location.href;
        // var host_name = window.location.hostname;
        // var pathname  = window.location.pathname;
        // var res = host_name.split(pathname);
        //var protocol = window.location.protocol + "//";
        //var base_url = protocol + 'localhost';
       // console.log("go")
        var url_pass = baseUrl + '/JsControl';
        var field_name = $(this).attr("field-name");
        var table = $(this).attr("data-db");
        var span = "span_" + field_name;
        var value = $(this).val();
        var dataString = 'field_name=' + field_name + '&table=' + table + '&unique_field=1' + "&value=" + value;
        var obj = $(this);
        $.ajax({
            type: 'post',
            url: url_pass,
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                html_out = html.trim();
                if (html_out == "off") {
                    var validClass = $(this).hasClass("unique-error") ;
                    if( validClass != true) {
                        obj.css("border-color", "red");
                        obj.addClass("unique-error");
						obj.next(".unique-span").remove();
                        obj.after('<span style="color: red" class="unique-span"> مسجل من قبل  </span>');
                        $('[type="submit"]').attr("disabled", "disabled");
                        //$('inpu[type="submit"]').attr("disabled","disabled");
                    }
                } else {
                    obj.css("border-color", "green");
                    obj.next(".unique-span").remove();
                    obj.removeClass("valid-error");
                    $('[type="submit"]').removeAttr("disabled");
                }
            }
        });
        return false;
    });
    //==================================================
    $(".only-number").keypress(function(event) {
        var obj = $(this);
        var theEvent = event || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) {
                theEvent.preventDefault()
            }
            var validClass =obj.hasClass("num-error") ;
            if( validClass != true) {
                obj.addClass("num-error");
                obj.after('<span style="color: red" class="num-span"> يرجى إدخال ارقام فقط  </span>');
            }
        }else{
            obj.next(".num-span").remove();
            obj.removeClass("num-error");
        }

    });
    //==================================================
    $(".only-En").keypress(function (event) {
        var obj = $(this);
        var theEvent = event || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /^[A-Za-z0-9-@-_]*$/;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) {
                theEvent.preventDefault()
            }
            var validClass =obj.hasClass("en-error") ;
            if( validClass != true) {
                obj.addClass("en-error");
                obj.after('<span style="color: red" class="enshlish-span"> يرجى الادخال باللغه الانجليزية فقط </span>');
            }
        }else{
            obj.next(".enshlish-span").remove();
            obj.removeClass("en-error");
        }
    });
    //==================================================
    $(".person-tabs").click(function () {
        var obj = $(this) ;
        var $li = obj.closest('li');
        //-----------------------
        $('[role="presentation"]').each(function() {
            $( this ).removeClass( "active" );
        });
        //-----------------------
        var toTab = obj.attr("to-tab");
        var id = obj.attr("person-id");
        var dataString =  "tab_name=" + toTab;
        $("#tab_change").html('<div class="loader"></div>');
        $.ajax({
            type:'post',
            url: baseUrl + '/web-person-tab/'+id,
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#tab_change").html(html);
                //-------------------------------
                doJquryCode();
                //-------------------------------
            },
            error:function(error){
                console.log(error.responseText);
            }
        });
    });
    //==================================================
    $(".company-tabs").click(function () {
        var obj = $(this) ;
        var $li = obj.closest('li');
        //-----------------------
        $('[role="presentation"]').each(function() {
            $( this ).removeClass( "active" );
        });
        //-----------------------
        $li.addClass("active");
        var toTab = obj.attr("to-tab");
        var id = obj.attr("person-id");
        var dataString =  "tab_name=" + toTab;
        $("#tab_change").html('<div class="loader" style="margin: auto"></div>');
        $.ajax({
            type:'post',
            url: baseUrl + '/web-company-tab/'+id,
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                //console.log(html)
                $("#tab_change").html(html);
                //-------------------------------
                doJquryCode();
                //-------------------------------
            },
            error:function(error){
                console.log(error.responseText);
            }
        });
    });
    //==================================================
    $('.search-bt').on('click', function(e) {
        var dataString = $(".search_key").serialize();
        //console.log(dataString);
        $("#option_table").html('<div class="loader" style="margin: auto;"></div>');
        $.ajax({
            type:'post',
            url: baseUrl +'searchBy',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                //   console.log(html);
                $('#search_result').html(html);
            },
            error:function(error){
                console.log(error.responseText);
            }
        });
    });
    //==================================================
    $(".log-me").click(function (){
        //console.log("go")
        var obj = $(this);
        var $form = obj.closest("form");
        var user_name = $("[log-me ='name']",$form).val();
        var password  = $("[log-me ='pass']",$form).val();
        var dataString = {user_name:user_name,password:password};
        //console.log(dataString)
        $.ajax({
            type:'post',
            url: baseUrl+'/web-auth',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(result){
                result = JSON.parse(result);
                //console.log(result)
                if(result.code == 200){
                    var html = '<div class="alert alert-success" role="alert"> تم بنجاح   </div>';
                    $(".log-me-div",$form).html(html);
                    window.location = result.url;
                }
                else{
                    var text = "";
                    var clas = "danger";
                    switch (result.code) {
                        case 422:
                            text ="إدخل جميع البيانات ";
                            break;
                        case 401: // wrong pass
                            text ="تأكد من  كلمة المرور " ;
                            break;
                        case 404:// not found
                            text = "تأكد من بيانات الحساب ";
                            break;
                        case 423: // blocked account
                            text = "حسابك تم المراجعة من قبل إدارة النظام وسيتم التفعيل فى الوقت القريب  ";
                            break;
                        default:
                            text = "خطأ" ;
                    }
                    var html = '<div class="alert alert-'+clas+'" role="alert">' +
                        '<h5 class="text-center">'+ text +' </h5> </div>';
                    $(".log-me-div",$form).html(html);
                }
            },
            error:function(error){
                console.log(error.responseText);
                $(".log-me-div",$form).html("خطأ خطأ ");
            }
        });

    });
    //==================================================
    $(".get-project-team").on('change',function (){
        var project_id = $(this).val();
        if (project_id != "") {
            $.ajax({
                type: 'get',
                url: baseUrl + '/JsControl/getProjectTeam/' + project_id,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#project-team").html(html);
                },
                error: function (error) {
                    console.log(error.responseText);
                }
            });
        }
    });
    //==================================================
    $(".append-frist-tr").click( function () {
        //  class="append-frist-tr"  add-body-id=""
        var tbody_id      = "#"+$(this).attr("add-body-id");
        var tbody = $(tbody_id);
        var itm = $('tr:first',tbody);
        var cln = itm.clone(true);
        cln.find("input[type='text']").val("");
        cln.get(0).className ="" ;
        cln.appendTo(tbody_id);
    });
    //==================================================
    $(".remove-table-row").click( function () {
        var remove_tr = $(this).parents('tr');
        var cbs = document.getElementsByClassName('remove-table-row');
        if ( cbs.length > 1 ) {
            $(this).parents('tr').remove();
        }
        else{
            alert("لا يمكنك الحذف !");
        }
    });
    //==================================================
    $( "#be-hdoor" ).click(function() {
        var obj  = $(this);
        var task     = obj.attr('task-id');
        var project  = obj.attr('project-id');
        var employee = obj.attr('employee-id');
        $( "#task_id" ).val(task);
        $( "#project_id" ).val(project);
        $( "#employee_id" ).val(employee);
        $( "#hdoor-div" ).toggle();
    });
    //==================================================
	$(document).on("change", ".unique-tr", function () {
		var mainObj = this;
		var obj = $(this);
		var mainVal = $('option:selected', mainObj).val();
		$(".unique-tr").not(mainObj).each(function (index, value) {
			var subObj = $(this);
			var otherVal = $('option:selected', subObj).val();
			if (otherVal == mainVal) {
				subObj.parents('tr').remove();
			}
		});

	});
    //==================================================

});// end main function

//=========================================================================
function getVisitDay(dateValue){
    var dataString = {search:"search_visit_day",searchDate:dateValue};
    //console.log("ahmed")
    $.ajax({
        type:'post',
        url: baseUrl+'/Dashboard/statistics',
        data:dataString,
        dataType: 'html',
        cache:false,
        success: function(result){
            // console.log(result)
            $("#daly_visit").html(result);
        },
        error:function(error){
            console.log(error.responseText);
        }
    });
}
//=========================================================================
function getVisitMonth(monthValue) {
    var dataString = {search:"search_visit_month",searchMonth:monthValue};
    // console.log("ahmed")
    $.ajax({
        type:'post',
        url: baseUrl+'/Dashboard/statistics',
        data:dataString,
        dataType: 'html',
        cache:false,
        success: function(result){
            //  console.log(result)
            $("#month_visit").html(result);
        },
        error:function(error){
            console.log(error.responseText);
        }
    });
}
//=========================================================================
function valid() {
    if($("#user_pass").val().length > 6){
        /*document.getElementById('validate1').style.color = '#00FF00';
        document.getElementById('validate1').innerHTML = 'كلمة المرور قوية';
        */
		$("#user_pass").css('borderColor','#00FF00');
        $('[type="submit"]').removeAttr("disabled");
    }
    else{
        /*document.getElementById('validate1').style.color = '#F00';
        document.getElementById('validate1').innerHTML = 'كلمة المرور ضعيفة';
        */
		$("#user_pass").css('borderColor','#F00');
        $('[type="submit"]').attr("disabled", "disabled");
    }
}
function valid2() {
    if($("#user_pass").val() == $("#user_pass_validate").val()){
        /*document.getElementById('validate').style.color = '#00FF00';
        document.getElementById('validate').innerHTML = 'كلمة المرور متطابقة';
        */
        $("#user_pass").css('borderColor','#00FF00');
        $("#user_pass_validate").css('borderColor','#00FF00');
        $('[type="submit"]').removeAttr("disabled");
    }else{
        /*document.getElementById('validate').style.color = '#F00';
        document.getElementById('validate').innerHTML = 'كلمة المرور غير متطابقة';
        */
        $("#user_pass").css('borderColor','#F00');
        $("#user_pass_validate").css('borderColor','#F00');
        $('[type="submit"]').attr("disabled", "disabled");
    }
}

/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */
function getOrderData(id){
	// data-toggle="modal" data-target="#m_modal_details"
	$("#option_details").html('');
	$.ajax({
		type:'get',
		url: baseUrl+'admin-orders/one/'+id,
		dataType: 'html',
		cache:false,
		success: function(html){
			$("#option_details").html(html);
		},
		error:function(error){
			console.log("error =" + 500);
			console.log(error.responseText);
		}
	});
}

function getOrderDetails(id){
	// data-toggle="modal" data-target="#m_modal_details"
	$("#option_details").html('');
	$.ajax({
		type:'get',
		url: baseUrl+'app-orders/oneMain/'+id,
		dataType: 'html',
		cache:false,
		success: function(html){
			$("#option_details").html(html);
		},
		error:function(error){
			console.log("error =" + 500);
			console.log(error.responseText);
		}
	});
}
/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */
function getClientOrders(){
	// data-toggle="modal" data-target="#m_modal_details"
	var id = $("#user_id").val();
	if(id != "0"){
		$("#option_result").html('<div class="loader-search"></div>');
		$.ajax({
			type:'get',
			url: baseUrl+'admin-orders/client-ordrs/'+id,
			dataType: 'html',
			cache:false,
			success: function(html){
				console.log("code  = 200");
				$("#option_result").html(html);
			},
			error:function(error){
				console.log("code  = 500");
				console.log(error.responseText);
			}
		});
	}else{
		alert("يجب اختيار العميل !");
	}
}
/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */
function getProviderOrders(){
	// data-toggle="modal" data-target="#m_modal_details"
	var id = $("#user_id").val();
	if(id != "0"){
		$("#option_result").html('<div class="loader-search"></div>');
		$.ajax({
			type:'get',
			url: baseUrl+'admin-orders/provider-ordrs/'+id,
			dataType: 'html',
			cache:false,
			success: function(html){
				console.log("code  = 200");
				$("#option_result").html(html);
			},
			error:function(error){
				console.log("code  = 500");
				console.log(error.responseText);
			}
		});
	}else{
		alert("يجب اختيار مقدم الخدمة !");
	}
}
/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */
function getProviderStatement() {
	var id = $("#user_id").val();
	var from_date = $("#from_date").val();
	var to_date = $("#to_date").val();
	var dataSring = "user_id="+id+"&from_date="+from_date+"&to_date="+to_date;
	if(id != "0"){
		$("#option_result").html('<div class="loader-search"></div>');
		$.ajax({
			type:'get',
			url: baseUrl+'admin-accounts/statementLoad?'+dataSring,
			dataType: 'html',
			cache:false,
			success: function(html){
				console.log("code  = 200");
				$("#option_result").html(html);
			},
			error:function(error){
				console.log("code  = 500");
				console.log(error.responseText);
			}
		});
	}else{
		alert("يجب اختيار مقدم الخدمة !");
	}
}

/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */
function addToWishlist(id){
	$.ajax({
		type:'get',
		url: baseUrl+'actionToFavourite/'+id,
		dataType: 'html',
		cache:false,
		success: function(msgSuccess){
			console.log("code  = 200");
			swal(msgSuccess, "", "success");
		},
		error:function(error){
			console.log("code  = 500");
			console.log(error.responseText);
		}
	});
}
/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */
function appOrdersMain(){
    var dataString = $(".searchOption").serialize();
    $("#option_result").html('<tr><td colspan="6"><div class="loader-search"></div></td></tr>');
    $.ajax({
        type:'get',
        url: baseUrl+'app-orders/mainLoad?'+dataString,
        dataType: 'html',
        cache:false,
        success: function(html){
            console.log("code  = 200");
            $("#option_result").html(html);
        },
        error:function(error){
            console.log("code  = 500");
            console.log(error.responseText);
        }
    });
}
/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */
function appOrdersAll(){
    var dataString = $(".searchOption").serialize();
    $("#option_result").html('<tr><td colspan="6"><div class="loader-search"></div></td></tr>');
    $.ajax({
        type:'get',
        url: baseUrl+'app-orders/indexLoad?'+dataString,
        dataType: 'html',
        cache:false,
        success: function(html){
            console.log("code  = 200");
            $("#option_result").html(html);
        },
        error:function(error){
            console.log("code  = 500");
            console.log(error.responseText);
        }
    });
}
