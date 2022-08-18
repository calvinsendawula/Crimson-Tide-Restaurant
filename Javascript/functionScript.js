function increaseNo(qtyBoxID){
	let qtyBoxValue = 1;
	qtyBoxValue+=1;
	document.getElementById(qtyBoxID).innerHTML = "qtyBoxValue";
}

function decreaseNo(qtyBoxID){
	let qtyBoxValue = 2;
	qtyBoxValue-=1;
	document.getElementById(qtyBoxID).innerHTML = "qtyBoxValue";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function changeItemQuantity( id , num ) {
    var qty_id = "cart[" + id + "][qty]";
    var currentVal = parseInt( $(qty_id).value );
    if ( currentVal != NaN )
    {
        $(qty_id).value = currentVal + num;
        $("products-table-basket").submit();
    }
}