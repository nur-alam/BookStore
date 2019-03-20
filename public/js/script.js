// preview image
function readImage(input){

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewimg')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }

}

$(document).ready( function ($) {

    setTimeout(function(){
        $('.success-float').hide();
    },1000);

    let searchbox = document.getElementById("search"),
        el = document.getElementById("search_list");
    $(document).on('keyup','#search',function (event) {
        let key = searchbox.value;
        el.innerHTML = '';
        if ( key === undefined || key === '' || key === ' ' || key.length<=0 ) {
            $("#search_list").css({"display": "none"});
            searchbox.value = null;
        }
        else
            axios.get('/search/'+key)
                .then(function (res) {
                    if (res.data) {
                        //$('#search_list').show();
                        $("#search_list").css({"display": "block"});
                        res.data.map(data => {
                            el.innerHTML += `<a href="/book/${data.name}" class="list-group-item" onmouseover="this.style.background='#ddd'" onmouseout="this.style.background='#fff'" style=""> 
                                            <img src="/${data.image}" class="pull-left" style="max-width: 80px; max-height: 80px;margin-right: 10px;">
                                            <div class="pull-left" style="margin-right: 20px;">
                                                <p>${data.name}</p>
                                                <p>${data.author}</p>
                                            </div> 
                                            <div class="pull-right">
                                                <p style="font-weight: bold;"> Price = <span style="font-weight: bold;">${data.price}</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                         </a>`;
                        });
                    } else {
                        //el.innerHTML = `<p>No result found!</p>`;
                        console.log("something went wrong!!");
                    }
                }).catch(function (err) {
                    console.log(err);
                })
    });

    $(document).on('click','body', function (event) {
        //$('#search_list').hide();
        //let el = document.getElementById("search_list");
        $("#search_list").css({"display": "none"});

    });

});


function qty(book_id){
    let qty = document.getElementById('qty_'+book_id).value;
    axios.patch('/cart/'+book_id, {
      book_id : book_id,
      qty : qty
    }).then(function (res) {
        if(res.data){
            location.reload();
        }
    });
}

function searchFunction() {
    let body = document.getElementsByTagName('body');
    let searchbox = document.getElementById("search"),
        el = document.getElementById("search_list");
    let key = searchbox.value;
    el.innerHTML = '';
    if (key === undefined || key === '' || key === ' ' || key.length<=0){
        searchbox.value = null;
    }
    else
        axios.get('/search/'+key)
            .then(function (res) {
                if (res.data) {

                    res.data.map(data => {
                        el.innerHTML += `<a href="/book/${data.name}" class="list-group-item" onmouseover="this.style.background='#ddd'" onmouseout="this.style.background='#fff'" style=""> 
                                            <img src="/${data.image}" class="pull-left" style="max-width: 80px; max-height: 80px;margin-right: 10px;">
                                            <div class="pull-left" style="margin-right: 20px;">
                                                <p>${data.name}</p>
                                                <p>${data.author}</p>
                                            </div> 
                                            <div class="pull-right">
                                                <p style="font-weight: bold;"> Price = <span style="font-weight: bold;">${data.price}</span></p>
                                            </div>
                                         </a>`;
                    });

                    //el.appendChild = htm;
                    //el.innerHTML += htm;
                    console.log(htm);
                } else {
                    console.log("something went wrong!!");
                }
            }).catch(function (err) {
                console.log(err);
            })
}

function disableSearchResult() {
    let el = document.getElementById("search_list");
    el.innerHTML = '';
}
