function tabSwitch(new_tab, new_isi) {
     
    document.getElementById('content1').style.display = 'none';
    document.getElementById('content2').style.display = 'none';
    document.getElementById(new_isi).style.display = 'block';   
     
 
    document.getElementById('tab_1').className = '';
    document.getElementById('tab_2').className = '';     
    document.getElementById(new_tab).className = 'active';      
}