_____(8)____('muban.admin')
@section('content')
<div class="content">
  <table>
  ____(9)___
    <tr>
        <td align="center">
          <input type="checkbox" name="box" value="{{$v->id}}" class="box"/>
        </td>
        <td>{{$v->id}}</td>
        <td>{{$v->title}}</td>
        <td>{{$v->pric}}</td>
        <td>删除</td>
    <tr>
                  
  @endforeach
</table>
<input type="button" value="批量删除" id="but">
</div>
<script>

 $("#but").click(function(){
     //获取到所有的input
     var  box = $("input[name='box']");
     //去所有的input长度
     length =box.length;
     // alert(length);
     var str ="";
     for(var i=0;i<length;i++){
         //如果数组中的checked 为true  就将他的id进行拼接
         if(box[i].checked==true){
             str =str+","+box[i].value;
         }
     }
     //将拼接的字符串第一个，号删除
     str= str.substr(1);

     //ajax  将id传入后台
     $.ajax({
         url:"______(10)_____",
         type:"get",
         data:{str:str},
         success:function (a) {
            a.forEach(function(ele){
                $("input").each(function(){
                  if($(this).val()==ele){
                    $(this).parents("tr").remove();
                  }
                })
            })
         }
     })
 })
   
</script>
@endsection 