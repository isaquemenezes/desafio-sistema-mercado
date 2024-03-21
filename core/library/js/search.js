//javascritp de search
function getRoot(){
    if (window.location.hostname == "localhost") {
        var root = window.location.protocol+"//"+document.location.hostname+"/gitlab/manager-card/core/helpers/";
    } else {
        var root = window.location.protocol+"//"+document.location.hostname+"/core/helpers";
    }
            
    return root;
}

var form_search = document.getElementById('form_search');

if(form_search)
{
    form_search.addEventListener('submit', async (e) => {
        e.preventDefault();
        var data = new FormData(form_search);
        // for(var _data of data.entries())
        // {
        //     console.log(_data[0] + " valor=>  " + _data[1]);
        // }

        var __data = await fetch(getRoot()+'search.php',{
            method: "POST",
            body: data

        });

        var res = await __data.json();
        console.log(res);
    });
}