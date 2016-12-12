


 $(window).on("load resize", function(){


    $('#why-dob-message-icon').hover(function() {
            $('#why-dob-message').slideDown();
        }, function() {
            $('#why-dob-message').hide();
        });


    });


      jQuery(document).ready(function ($) {


            $("#birthMonth, #birthYear").change(function () {
            //  $("#Continue").attr("disabled", "disabled");
                if ($("#birthMonth, #birthYear").val().trim() != "" && $("#birthYear").val().trim() != "") {

                    $.ajax({
                        cache: false,
                        url: "/?controller=contact&action=checkage",
                        type: "post",
                        async: true,
                        data: {
                            birthMonth: $("#birthMonth").val(),
                            birthYear: $("#birthYear").val()
                        },
                        success: function (data) {
                            if (data.trim() == "success") {
                                jQuery("#age-error").html("");
                                jQuery("#age-error").hide();
                                $("#Continue").removeAttr("disabled");


                            } else {
                                jQuery("#age-error").html("Sorry, you do not meet the age requirement.");
                                jQuery("#age-error").show();
                                jQuery("#Continue").attr("disabled", "disabled");

                            }
                        },

                        // complete: function () {
                        //     $("#Continue").removeAttr("disabled");
                       // }
                    })
                } else {

                  //  $("#Continue").removeAttr("disabled");
                    $("#age-error").html("");
                    $("#age-error").hide();
                }
            });

            function submitForm() {
                if (jQuery("#age-error").html() == "") {
                    return true;
                } else {
                    jQuery("#age-error").show();
                    return false;
                }
            }


            $("#aspnetForm").hide();

            var writeAboutGeneral = {
                '': '-SELECT-',
                'Company or Business Information': 'COMPANY OR BUSINESS INFORMATION',
                'Promotions': 'PROMOTIONS',
                'Media Contacts': 'MEDIA CONTACTS',
                'Web Site': 'WEBSITE',
                'Our Online Store': 'ONLINE STORE',
                'Employment': 'EMPLOYMENT',
                'International': 'INTERNATIONAL',
                'Other': 'OTHER'
            }
            var writeAboutProduct = {
                '': '-SELECT-',
                'Availability/Finding Product': 'AVAILABILITY/FINDING PRODUCT',
                'Ingredients': 'INGREDIENTS',
                'Nutrition': 'NUTRITION',
                'Other': 'OTHER',
                'Packaging': 'PACKAGING',
                'Quality': 'QUALITY',
            }

            jQuery.validator.addMethod("zipcode", function (value, element) {
                return this.optional(element) || /^\d{5}(?:-\d{4})?$/.test(value);
            }, "Please enter a valid zip code.");

            jQuery.validator.addMethod("phoneNumber", function (value, element) {
                return this.optional(element) || /^\(?[\d\s]{3}-[\d\s]{3}-[\d\s]{4}$/.test(value);
            }, "Please enter a valid phone number (example, 555-555-5555).");

            jQuery.validator.addMethod("emailAddress", function (value, element) {
                var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{1,4}\b$/i
                return this.optional(element) || pattern.test(value);
            }, "Please enter a valid email address.");

            var v = $("#aspnetForm").validate({
                errorClass: 'error-messages',
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "ProductFeedback") {
                        error.appendTo("#rblProductFeedback");
                    } else if (element.attr("name") == "ProductFeel") {
                        error.appendTo("#rblProductFeel");
                    } else if (element.attr("name") == "dob") {
                        error.insertAfter("#why-dob-message-icon");
                    } else if (element.attr("name") == "birthMonth") {
                        $("#birth-month-message").html(error);
                    } else if (element.attr("name") == "birthYear") {
                        $("#birth-year-message").html(error);
                    } else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    txtDetails: {
                        required: {
                            depends: function () {
                                if($.trim($(this).val()) == '') {
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                }
                            }
                        },
                        maxlength: 1000,
                    },
                    txtFirstName: {
                        required: {
                            depends: function () {
                                if($.trim($(this).val()) == '') {
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                }
                            }
                        },
                    },
                    txtLastName: {
                        required: {
                            depends: function () {
                                if($.trim($(this).val()) == '') {
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                }
                            }
                        },
                    },
                    txtAddress1: {
                        required: {
                            depends: function () {
                                if($.trim($(this).val()) == '') {
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                }
                            }
                        },
                    },
                    txtCity: {
                        required: {
                            depends: function () {
                                if($.trim($(this).val()) == '') {
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                }
                            }
                        },
                    },
                    txtZip: {
                        required: {
                            depends: function () {
                                if($.trim($(this).val()) == '') {
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                }
                            }
                        },
                        zipcode: true,
                    },
                    txtPhone: {
                        required: {
                            depends: function () {
                                if($.trim($(this).val()) == '') {
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                }
                            }
                        },
                        phoneNumber: true,
                    },
                    txtEmailAddress: {
                        required: {
                            depends: function () {
                                if($.trim($(this).val()) == '') {
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                }
                            }
                        },
                        emailAddress: true,
                    },
                },
                messages: {
                    ProductFeedback: {
                        required: 'Please choose the type of feedback you would like to share with us.'
                    },
                    ddlCategories: {
                        required: 'Please select a category.'
                    },
                    ddlProductProduct: {
                        required: 'Please select a product.'
                    },
                    ddlProductTopic: {
                        required: 'Please select what you want to write about.'
                    },
                    ProductFeel: {
                        required: 'Please select how you feel.'
                    },
                    txtDetails: {
                        required: 'Please enter your comments.',
                        maxlength: jQuery.validator.format('Your comments must be 1,000 characters or fewer.'),
                    },
                    txtFirstName: {
                        required: 'Please enter your first name.'
                    },
                    txtLastName: {
                        required: 'Please enter your last name.'
                    },
                    txtEmailAddress: {
                        required: 'Please enter your email address.',
                        email: 'Please enter a valid email address.'
                    },
                    txtAddress1: {
                        required: 'Please enter your address.'
                    },
                    txtCity: {
                        required: 'Please enter your city.'
                    },
                    ddlState: {
                        required: 'Please enter your state.'
                    },
                    txtZip: {
                        required: 'Please enter your zip code.'
                    },
                    txtPhone: {
                        required: 'Please enter your phone number.'
                    },
                    birthMonth: {
                        required: 'Please select a month for your birthdate.',
                    },
                    birthYear: {
                        required: 'Please select a valid year for your birthdate.',
                    },
                }
            });

            $("#Back").on('click', function () {
              //  $("#headContent").show();
                $("#general-content").show();
                $("#aspnetForm").hide();
                $("#ddlProductProduct").html('<option>-SELECT-</option>').attr("disabled", "disabled");
                $("#aspnetForm").trigger('reset');
                jQuery("#aspnetForm").trigger('reset');
                jQuery("#age-error").html("");
                jQuery("#age-error").hide();
                v.resetForm();
            });

            $("#lnkGeneralQuestions").on('click', function () {
                $('#general-content').hide();


                $("#ddlProductTopic").html('');
                $.each(writeAboutGeneral, function (key, value) {
                    var option = $("<option/>");
                    option.attr("value", key).html(value);
                    $("#ddlProductTopic").append(option);
                });

                $("span.error-messages").remove();

                $("#aspnetForm").trigger('reset');
                $('#aspnetForm').show();
                $('#step1').show();
                $('#step2').hide();
                $('#Next').show();
                $('#Previous').hide();
                $('#Continue').hide();
                $('#group-heading').text("");
                $('#group-heading').append("General Questions:");
                $('#pnlGeneral2').text("");
                $('#pnlGeneral2').append("<h2 class='description-headingH2'>Contact Us — About Your Question</h2>");
                $('#product-question-0').hide().find('#ddlCategories').removeClass('required').val("");
                $('#product-question-1').hide().find('#ddlProductProduct').removeClass('required').empty().html("<option value=''>-SELECT-</option>").attr("disabled", "disabled");
                $('#product-question-2').hide().find('#txtUPC').val("");

                $("#label4").html('1');
                $("#label5").html('2');
                $("#label6").html('3');
            });

            $("#lnkProductQuestions").on('click', function () {
                $('#general-content').hide();

                $("#ddlProductTopic").html('');
                $.each(writeAboutProduct, function (key, value) {
                    var option = $("<option/>");
                    option.attr("value", key).html(value);
                    $("#ddlProductTopic").append(option);
                });

                $("span.error-messages").remove();

                $("#aspnetForm").trigger('reset');
                $('#aspnetForm').show();
                $('#step1').show();
                $('#step2').hide();
                $('#Next').show();
                $('#Previous').hide();
                $('#Continue').hide();
                $('#group-heading').text("");
                $('#group-heading').append("Product Questions:");
                $('#pnlGeneral2').text("");
                $('#pnlGeneral2').append("<h2 class='description-headingH2'>Contact Us — About Your Question</h2>");
                $('#product-question-0').show().find('#ddlCategories').addClass('required');
                $('#product-question-1').show().find('#ddlProductProduct').addClass('required');
                $('#product-question-2').show();

                $("#label1").html('1');
                $("#label2").html('2');
                $("#label3").html('3');
                $("#label4").html('4');
                $("#label5").html('5');
                $("#label6").html('6');

            });

            $("#Next").on('click', function () {


                if (v.form()) {
                    $('#intro-custom').hide();

                    $('#Back').hide();
                    $('#email').hide();
                    $('#step1').hide();
                    $('#Next').hide();
                    $('#Previous').attr('style', 'display:inline-block').show();
                    $('#step2').show();
                    $('#Continue').attr('style', 'display:inline-block').show();
                }
            });

            $('#Previous').on('click', function () {

                $('#intro-custom').show();
                $("#why-dob-message").hide();
                $('#Back').show();
                $('#email').show();
                jQuery("#aspnetForm").validate().resetForm();
                jQuery('#step1').show();
                jQuery('#Next').show();
                jQuery('#Previous').hide();
                jQuery('#step2').hide();
                jQuery('#Continue').hide();
                jQuery("#age-error").hide();
            });

            //$("#txtZip").mask("99999");
            //$("#txtPhone").mask("(999) 999-9999");
            $("#dob").datepicker({
                changeMonth: true,
                changeYear: true,
                showAnim: 'slideDown',
                yearRange: '1900:c'
            });

            $('#ddlCategories').on('change', function () {
              var val = $(this).val();
              $('#ddlProductProduct').removeAttr("disabled");
              $.ajax({
              cache: false,
              type: "POST",
            //  url: "",
               url: "/?controller=contact&action=product-return",
              data:'categoryId='+val,
              async: true,
              success: function(data){
                $("#ddlProductProduct").html(data);
              }
              });

            });


        });
