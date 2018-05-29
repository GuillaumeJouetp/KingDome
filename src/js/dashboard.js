function AfficheCache(Id)
  {
	if (document.getElementById(Id) != null)
    {
		if(document.getElementById(Id).style.display=="none") document.getElementById(Id).style.display="block";
		else document.getElementById(Id).style.display="none";
    }
  }