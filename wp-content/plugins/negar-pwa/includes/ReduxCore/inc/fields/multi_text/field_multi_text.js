!function(l){"use strict";redux.field_objects=redux.field_objects||{},redux.field_objects.multi_text=redux.field_objects.multi_text||{},redux.field_objects.multi_text.init=function(t){t||(t=l(document).find(".redux-container-multi_text:visible")),l(t).each(function(){var a=l(this),t=a;a.hasClass("redux-field-container")||(t=a.parents(".redux-field-container:first")),t.is(":hidden")||t.hasClass("redux-field-init")&&(t.removeClass("redux-field-init"),a.find(".redux-multi-text-remove").on("click",function(){redux_change(l(this)),l(this).prev('input[type="text"]').val("");var i=l(this).attr("data-id");l(this).parent().slideUp("medium",function(){if(l(this).remove(),1==a.find("#"+i+" li").length){var t=a.find(".redux-multi-text-add").attr("data-name");a.find("#"+i+' li:last-child input[type="text"]').attr("name",t)}})}),a.find(".redux-multi-text-add").click(function(){for(var t=parseInt(l(this).attr("data-add_number")),i=l(this).attr("data-id"),e=l(this).attr("data-name")+"[]",d=0;d<t;d++){var n=l("#"+i+" li:last-child").clone();a.find("#"+i).append(n),a.find("#"+i+" li:last-child").removeAttr("style"),a.find("#"+i+' li:last-child input[type="text"]').val(""),a.find("#"+i+' li:last-child input[type="text"]').attr("name",e)}1<a.find("#"+i+" li").length&&a.find("#"+i+" li").each(function(t,i){"none"===l(this).css("display")&&l(this).find('input[type="text"]').attr("name","")})}))})}}(jQuery);