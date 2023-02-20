function ErrorHandle(){
    swal({ 
        title: js_lang.error, 
        text: js_lang.error_message,
        type: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: js_lang.confirm, 
    });
}

function ResultHandle(result){
    swal({
        title: swal_status[result.result],
        text: result.message,
        html: true,
        type: ((result.result)?"success":"error"),
    });
}

function TimeFormat(datetime) {
    let t = new Date(datetime);
    return `${t.getFullYear()}-${(t.getMonth()+1).toString().padStart(2,0)}-${t.getDate().toString().padStart(2,0)} ${t.getHours().toString().padStart(2,0)}:${t.getMinutes().toString().padStart(2,0)}:${t.getSeconds().toString().padStart(2,0)}`;
}