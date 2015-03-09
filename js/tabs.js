tabSwitcher = {
  _map: {},

  init: function()
  {
    // Check each UL on the page, to see if it's a tablist
    lists = document.getElementsByTagName('ul');
    for(i=0; i<lists.length; i++)
    {
      if(lists[i].className.indexOf('tablist') >= 0)
      {
        // If we find a tablist, put each item in the map
	items = lists[i].getElementsByTagName('li');
	for(j=0; j<items.length; j++)
	{
	  // Map the item's REL attribute to this tablist
	  tabSwitcher._map[items[j].getAttribute('rel')] = lists[i].id;

	  // When the user clicks this item, run switcher
	  items[j].onclick = function()
	  {
	    tabSwitcher.action(this.getAttribute('rel'));
	    return false;
	  };
	}

	// Leave this tab list in a default state of
	// first item active
	tabSwitcher.action(items[0].getAttribute('rel'));
      }
    }
  },

  action: function(target)
  {
    // Fetch all the tab list items in the same list as the target
    tablist = document.getElementById(tabSwitcher._map[target]);
    listitems = tablist.getElementsByTagName('li');

    for(k=0; k<listitems.length; k++)
    {
      // If this item's REL is the same as the clicked item,
      // activate the tab list item and show the content
      rel = listitems[k].getAttribute('rel');
      if(rel == target)
      {
        listitems[k].className = 'tab_hi';
        document.getElementById(rel).style.display = 'block';
      }

      // Otherwise, make the tab list item inactive and hide the content
      else
      {
        listitems[k].className = 'tab';
        document.getElementById(rel).style.display = 'none';
      }
    }
  }
};

window.onload = tabSwitcher.init;