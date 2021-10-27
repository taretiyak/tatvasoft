$(document).ready(function(){
    $(document).on('keyup','#tags',function(e){
        key=e.which;
        if(key==32 && $(this).val().trim()!==''){
            tag=$(this).val().trim();
            $('#preview-tags').append(`<div class="input-group flex-nowrap">
            <div class="tags">`+tag+`<span class="delete-tags" rel=`+tag+`> X</span>
          </div>`) ;
          $tags=$('#hidden_tags').val()+tag+'@.';
          $('#hidden_tags').val($tags);
          $(this).val('');
        }
    });
    $(document).on('click','.delete-tags',function(){
        let text=$(this).attr('rel').trim();
        console.log(text);
        $(this).parent().remove();
        let all_tags=$('#hidden_tags').val().trim();
        console.log(all_tags);
        all_tags=all_tags.replace(text+'@.','');
        $('#hidden_tags').val(all_tags);
    });
    $(document).on('click','.delete-blog',function(){
        let id=$(this).attr('rel');
        if(confirm('you want to delete this')){
            window.location.href="/deleteblog/"+id;
        }
    });
    function maxalert(that){
        let val=$(that).val();
        let max=$(that).attr('max');
        if(val>max){
            alert("text limit full")
        }
    }
})