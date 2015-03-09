$(function(){
  var urlComponents = window.location.href.split(/#/);

  function selectedGroups() {
    return $('#groups :checkbox:checked').map(function() {
        return $(this).val();
      }).get().join(',');
  }

  function toggleGroup(group, visible) {
    $('#previews .t' + group).toggle(visible);
  }

  $('#groups :checkbox').change(function() {
    toggleGroup($(this).attr('name'), $(this).is(':checked'));
    window.location.replace('#' + selectedGroups());
  });

  // URL detection
  if(urlComponents[1] != undefined) {
    var groups = urlComponents[1].split(/,/);

    $('#groups :checkbox').each(function() {
      if($.inArray($(this).val(), groups) < 0) {
        $(this).attr('checked', false);
        toggleGroup($(this).attr('name'), false);
      }
    });
  }
});
