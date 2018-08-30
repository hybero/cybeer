
function popup(userHtml) {

    var popup = document.createElement("div");
    popup.id = 'popup';
    popup.className = 'popup';
    //popup.onclick = function() { document.body.removeChild(popup); };

    var outer = document.createElement("div");
    outer.className = 'outer';

    var middle = document.createElement("div");
    middle.className = 'middle';

    var inner = document.createElement("div");
    inner.className = 'inner';

    inner.innerHTML = userHtml;
    middle.appendChild(inner);
    outer.appendChild(middle);
    popup.appendChild(outer);
    //console.log(popup);

    document.body.appendChild(popup);
    return true;
};
