
                      <script type="text/javascript">
						    	function letteronly(input){
						    		var regex=/[^-a-z]/gi;
						    		input.value=input.value.replace(regex,"");
						    	}
						   
						   </script>
						  <script>
						
						    	function numberonly(input){
						    		var regex=/[^0-9]/g;
						    		input.value=input.value.replace(regex,"");
						    	}
						
                            </script>
                          <script> 
						$(document).ready(function(){
							$('#fname').keyup(function(){
								var regexp= /^[a-zA-Z]+$/;
								if(regexp.test($('#fname').val())){
									$('#fname').closest('.form-group').removeClass('has-error');
									$('#fname').closest('.form-group').addClass('has-success');
								}else{
									$('#fname').closest('.form-group').addClass('has-error');
								}
							})
						
							});
						</script>

