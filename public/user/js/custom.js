$(document).ready(function(){
    getData();
    count();
    getTotal();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });
       function count(){

        var myproduct = localStorage.getItem('newData');
        if(myproduct){
            var myproduct_obj = JSON.parse(myproduct);
            if(myproduct_obj != 0){
                var count = myproduct_obj.length;
                $("#noti").html(count);
            }else{
                $("#noti").html(0);

            }
       }else{
        $("#noti").html(0);
       }
    };
    function getData(){
        getTotal();
        var myproduct=localStorage.getItem('newData');


        var result='';
        if(myproduct!=null){
            newData = JSON.parse(myproduct);
            var total = 0;
            $.each(newData,function (i,v) {

                subtotal=v.price*v.qty;
                total = total + subtotal;
                result += `
                       <tr class="text-center">

                       <td><img src="../images/${v.image}" height="100px"></td>

                                <td class="product-name">
                                    ${v.name}
                                </td>
                                <td>${v.price}</td>
                                <td colspan="3">
                                <button class="btn btn-outline-secondary plus_btn" data-id="${i}">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                ${v.qty}

                                <i class="fa fa-minus" aria-hidden="true"></i>
                               </button>
                               </td>
                               <td>
                                ${subtotal}
                                </td>
                              </tr>
                        `;
            });
        }

        $('.shoppingcart_table').html(result);
    }
    function getTotal(){

        var myproduct = localStorage.getItem('newData');

        var allTotal = $('#alltotal');

        if(myproduct != null){
            product = JSON.parse(myproduct);
            var total = 0;
            $.each(product, function(i,v){

                subtotal = v.price*v.qty;

                total += subtotal;


            })

        allTotal.html(total);
        }

    }

       $('.addtocart').click(function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        var price = $(this).data('price');
        var image = $(this).data('image');

        let item = {
            id: id,name: name,price: price,image: image,qty: 1
        }
        var oldData = localStorage.getItem('newData');
        if(oldData == null){
            var newData = new Array();
        }else{
            var newData = JSON.parse(oldData);
        }
        var exit;
        $.each(newData,function(i,v){
            if(id==v.id){
                v.qty++;
                exit=true;
            }
        })
        if(!exit){
            newData.push(item);
        }



        var MyArrayString = JSON.stringify(newData);

        localStorage.setItem('newData',MyArrayString);
        count();
        getData();
        getTotal();
       })

$('.buy_now').on('click', function(){


    var toOrder = localStorage.getItem('newData');

    $.post('/order',{orderData:toOrder},function(e){
        if(e){
            localStorage.clear();
            getData();
            location.href="/user/home";
        }
        console.log(e);
    })
})
})
