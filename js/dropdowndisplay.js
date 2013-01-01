// JavaScript Document

jQuery(document).ready(function() {
								
$("#link14").click(function () {
$("#schedule").hide();
$("#event").hide();
$("#pics").hide();
$("#add_admin").hide();
$("#delete_admin").hide();
$("#change_pwd").hide();
$("#edit_event").hide();
$("#insert_event").hide();
$("#featured_event").hide();
$("#insert_event_schedule").hide();
$("#delete_event").hide();
$("#delete_event_schedule").hide();
$("#Add_pics").hide();
$("#Delete_pics").hide();
$("#view_registrants").hide();
$("#view_events").hide();
$("#registrants").hide();
if ($("#settings").is(":hidden")) {
$("#welcome").hide();
$("#link14").addClass("active");
$("#link8").removeClass("active");
$("#link9").removeClass("active");
$("#link10").removeClass("active");
$("#link7").removeClass("active");
$("#settings").slideDown("400");
} else {
$("#link14").removeClass("active");
$("#settings").hide();
$("#welcome").show();
}
});


$("#link10").click(function () {
$("#schedule").hide();
$("#event").hide();
$("#settings").hide();
$("#add_admin").hide();
$("#delete_admin").hide();
$("#change_pwd").hide();
$("#edit_event").hide();
$("#insert_event").hide();
$("#featured_event").hide();
$("#insert_event_schedule").hide();
$("#delete_event").hide();
$("#delete_event_schedule").hide();
$("#Add_pics").hide();
$("#Delete_pics").hide();
$("#view_registrants").hide();
$("#view_events").hide();
$("#registrants").hide();
if ($("#pics").is(":hidden")) {
$("#welcome").hide();
$("#link10").addClass("active");
$("#link8").removeClass("active");
$("#link9").removeClass("active");
$("#link7").removeClass("active");
$("#link14").removeClass("active");
$("#pics").slideDown("400");
} else {
$("#link10").removeClass("active");
$("#pics").hide();
$("#welcome").show();
}
});


$("#link9").click(function () {
$("#event").hide();
$("#pics").hide();
$("#settings").hide();
$("#add_admin").hide();
$("#delete_admin").hide();
$("#change_pwd").hide();
$("#edit_event").hide();
$("#insert_event").hide();
$("#featured_event").hide();
$("#insert_event_schedule").hide();
$("#delete_event").hide();
$("#delete_event_schedule").hide();
$("#Add_pics").hide();
$("#Delete_pics").hide();
$("#view_registrants").hide();
$("#view_events").hide();
$("#registrants").hide();
if ($("#schedule").is(":hidden")) {
$("#welcome").hide();
$("#link9").addClass("active");
$("#link8").removeClass("active");
$("#link7").removeClass("active");
$("#link10").removeClass("active");
$("#link14").removeClass("active");
$("#schedule").slideDown("400");
} else {
$("#link9").removeClass("active");
$("#schedule").hide();
$("#welcome").show();
}
});


$("#link8").click(function () {
$("#schedule").hide();
$("#pics").hide();
$("#settings").hide();
$("#add_admin").hide();
$("#delete_admin").hide();
$("#change_pwd").hide();
$("#edit_event").hide();
$("#insert_event").hide();
$("#featured_event").hide();
$("#insert_event_schedule").hide();
$("#delete_event").hide();
$("#delete_event_schedule").hide();
$("#Add_pics").hide();
$("#Delete_pics").hide();
$("#view_registrants").hide();
$("#view_events").hide();
$("#registrants").hide();
if ($("#event").is(":hidden")) {
$("#welcome").hide();
$("#link8").addClass("active");
$("#link7").removeClass("active");
$("#link9").removeClass("active");
$("#link10").removeClass("active");
$("#link14").removeClass("active");
$("#event").slideDown("400");
} else {
$("#link8").removeClass("active");
$("#event").hide();
$("#welcome").show();
}
});

$("#link7").click(function () {
$("#schedule").hide();
$("#event").hide();
$("#pics").hide();
$("#settings").hide();
$("#add_admin").hide();
$("#delete_admin").hide();
$("#change_pwd").hide();
$("#edit_event").hide();
$("#insert_event").hide();
$("#featured_event").hide();
$("#insert_event_schedule").hide();
$("#delete_event").hide();
$("#delete_event_schedule").hide();
$("#Add_pics").hide();
$("#Delete_pics").hide();
$("#view_registrants").hide();
$("#view_events").hide();
if ($("#registrants").is(":hidden")) {
$("#welcome").hide();
$("#link7").addClass("active");
$("#link8").removeClass("active");
$("#link9").removeClass("active");
$("#link10").removeClass("active");
$("#link14").removeClass("active");
$("#registrants").slideDown("400");
} else {
$("#link7").removeClass("active");
$("#registrants").hide();
$("#welcome").show();
}
});

$("#link1").click(function () {
$("#delete_event").hide();
$("#edit_event").hide();
$("#view_events").hide();
$("#featured_event").hide();
if ($("#insert_event").is(":hidden")) {
$("#insert_event").slideDown("400");
} else {
$("#insert_event").hide();
}
});

$("#link2").click(function () {
$("#delete_event_schedule").hide();
if ($("#insert_event_schedule").is(":hidden")) {
$("#insert_event_schedule").slideDown("400");
} else {
$("#insert_event_schedule").hide();
}
});

$("#link3").click(function () {
$("#insert_event").hide();
$("#edit_event").hide();
$("#view_events").hide();
$("#featured_event").hide();
if ($("#delete_event").is(":hidden")) {
$("#delete_event").slideDown("400");
} else {
$("#delete_event").hide();
}
});

$("#link4").click(function () {
$("#insert_event_schedule").hide();
if ($("#delete_event_schedule").is(":hidden")) {
$("#delete_event_schedule").slideDown("400");
} else {
$("#delete_event_schedule").hide();
}
});

$("#link5").click(function () {
$("#Delete_pics").hide();
if ($("#Add_pics").is(":hidden")) {
$("#Add_pics").slideDown("400");
} else {
$("#Add_pics").hide();
}
});

$("#link6").click(function () {
$("#Add_pics").hide();
if ($("#Delete_pics").is(":hidden")) {
$("#Delete_pics").slideDown("400");
} else {
$("#Delete_pics").hide();
}
});

$("#link11").click(function () {
$("#insert_event").hide();
$("#delete_event").hide();
$("#view_events").hide();
$("#featured_event").hide();
if ($("#edit_event").is(":hidden")) {
$("#edit_event").slideDown("400");
} else {
$("#edit_event").hide();
}
});

$("#link12").click(function () {
if ($("#view_registrants").is(":hidden")) {
$("#view_registrants").slideDown("400");
} else {
$("#view_registrants").hide();
}
});

$("#link13").click(function () {
$("#insert_event").hide();
$("#delete_event").hide();
$("#edit_event").hide();
$("#featured_event").hide();
if ($("#view_events").is(":hidden")) {
$("#view_events").slideDown("400");
} else {
$("#view_events").hide();
}
});

$("#link18").click(function () {
$("#insert_event").hide();
$("#delete_event").hide();
$("#edit_event").hide();
$("#view_events").hide();
if ($("#featured_event").is(":hidden")) {
$("#featured_event").slideDown("400");
} else {
$("#featured_event").hide();
}
});

$("#link15").click(function () {
$("#delete_admin").hide();
$("#change_pwd").hide();
if ($("#add_admin").is(":hidden")) {
$("#add_admin").slideDown("400");
} else {
$("#add_admin").hide();
}
});

$("#link16").click(function () {
$("#add_admin").hide();
$("#change_pwd").hide();
if ($("#delete_admin").is(":hidden")) {
$("#delete_admin").slideDown("400");
} else {
$("#delete_admin").hide();
}
});

$("#link17").click(function () {
$("#add_admin").hide();
$("#delete_admin").hide();
if ($("#change_pwd").is(":hidden")) {
$("#change_pwd").slideDown("400");
} else {
$("#change_pwd").hide();
}
});


});