<?php 
if(in_array(request('lang') , ['ar' , 'en'])){
    session('local' , request('lang'));
}
redirect('/');