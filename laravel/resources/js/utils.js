class Utils{
    static dateFormat(date){
         return date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear()+' '+date.getHours()+':'+date.getMinutes();
     }
   static toLimit(string = "" , $limit){
        return string.substr(0 , $limit) ;


 }

    static plural(string){
        console.log(string.substr(-3));


 }

   limpar_input(){
     $("#cpf").val('');
     $("#nome").val('');
     $("#birthDate").val('');
}


}