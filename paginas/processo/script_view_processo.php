<script type="text/javascript">
    
    function todosAtos(){
        $a('#todos_atos').click(function(){
        
            var id_processo = $a('#id').val();       
            var limite = 1000000;        
     
            var url = 'get_todos_atos.php';
        
            $a.post(url,{
                id_processo:id_processo,
                limite:limite                
            }, function(data){
                //alert(data);
                $a(".tabela_at").remove();
                $a(data).appendTo("#tabela_ato"); 
                excluirAto();
            });            
            
        });
    
    }
    
    function loadAtos(){   
        
        var id_processo = $a('#id').val();       
        var limite = 3;        
     
        var url = 'get_todos_atos.php';
        
        $a.post(url,{
            id_processo:id_processo,
            limite:limite                
        }, function(data){
            //alert(data);
            $a(".tabela_at").remove();
            $a(data).appendTo("#tabela_ato");     
            todosAtos();
            excluirAto();
        });          

    }
    
    function retornaNumAtos(){
        $a('#max_ato').click(function(){
         
            loadAtos();                     
            
        });
    }
    
    function excluirAto(){
        $a('.excluir-ato').click(function(){
            //alert('opa');
            
            var dado = $a(this).find('input').val();  
            
         
            var dado_split = dado.split('|');
            var id_processo = dado_split[1];
            var id_ato = dado_split[0];
         
            var url = '../operacoes/CProcesso_ato/excluir_ato_op.php';
            
          
            
            $a.post(url,{
                id_processo:id_processo,
                id_ato:id_ato               
            }, function(data){
                loadAtos();
                
            });
            
            
        });
    }
    
    function excluirAudiencia(){
        $a('.excluir-audiencia').click(function(){            
            
            var dado = $a(this).find('input').val();  
          
            var id_audiencia = dado;
         
            var url = '../operacoes/CAudiencia/excluir_audiencia_op.php';
            
          
            
            $a.post(url,{
                id_audiencia:id_audiencia              
            }, function(data){
            
                loadAudiencia();
                excluirAudiencia();
                
            });
            
            
        });
    }
    
    
    
    function todasAudiencia(){
        $a('#todas_audiencias').click(function(){
        
            var id_processo = $a('#id').val();       
            var limite = 1000000;        
     
            var url = 'get_todas_audiencias.php';
        
            $a.post(url,{
                id_processo:id_processo,
                limite:limite                
            }, function(data){
                //alert(data);
                $a(".tabela_aud").remove();
                $a(data).appendTo("#tabela_audiencia");  
                excluirAudiencia();
                
            });            
            
        });
    
    }
   
    
    function loadAudiencia(){   
        
        var id_processo = $a('#id').val();       
        var limite = 3;
        
        //alert(id_processo);
        var url = 'get_todas_audiencias.php';
        
        $a.post(url,{
            id_processo:id_processo,
            limite:limite                
        }, function(data){
            //alert(data);
            $a(".tabela_aud").remove();
            $a(data).appendTo("#tabela_audiencia");    
            todasAudiencia();
            excluirAudiencia();
        });          

    }
    
    function retornaNumAudiencia(){
        $a('#max_audiencia').click(function(){
            loadAudiencia();   
            excluirAudiencia();
            
        });
    }
    
    
    $a(document).ready(function (){   
     
        loadAudiencia();
        todasAudiencia();
        todosAtos();
        loadAtos();
        retornaNumAtos();
        retornaNumAudiencia();
        excluirAto();
        excluirAudiencia();
       
        // alert("OI");
 
 
    
    }); 

</script>