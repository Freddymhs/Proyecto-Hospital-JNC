// JavaScript Document

function selecOp()
{
	var op=document.getElementById("modelo_pc");
	var op1=document.getElementById("modelo_pc1");
	var op2=document.getElementById("modelo_pc2");
	var op3=document.getElementById("modelo_pc3");
	var op4=document.getElementById("modelo_pc4");
	var op5=document.getElementById("modelo_pc5");
	var op6=document.getElementById("modelo_pc6");
	
	var proc=document.getElementById("procesador");
	var dd=document.getElementById("disco_duro");
	var ram=document.getElementById("ram");
		
	if(op){
		if (op.selectedIndex==0)proc.value="";
		if (op.selectedIndex==0)dd.value="";
		if (op.selectedIndex==0)ram.value="";
		
		if (op.selectedIndex==1)proc.value="Intel Pentium D 2.80 GHZ";
		if (op.selectedIndex==1)dd.value="80 GB";
		if (op.selectedIndex==1)ram.value="512 MB";
		
		if (op.selectedIndex==2)proc.value="Intel Pentium Dual CPU E2160 1.80 GHZ";
		if (op.selectedIndex==2)dd.value="160 GB";
		if (op.selectedIndex==2)ram.value="1 GB";
		
		if (op.selectedIndex==3)proc.value="Intel Pentium Core TM 2 duo CPU E7400 1.80 GHZ";
		if (op.selectedIndex==3)dd.value="300 GB";
		if (op.selectedIndex==3)ram.value="2 GB";
		
		if (op.selectedIndex==4)proc.value="Intel Core i3 CPU 2100 3.10 GHZ";
		if (op.selectedIndex==4)dd.value="300 GB";
		if (op.selectedIndex==4)ram.value="8 GB";
		
		if (op.selectedIndex==5)proc.value="Intel Core i3-4130T CPU 2.90 GHZ";
		if (op.selectedIndex==5)dd.value="500 GB";
		if (op.selectedIndex==5)ram.value="8 GB";
		
		if (op.selectedIndex==6)proc.value="AMD A8 PRO 7600B R7";
		if (op.selectedIndex==6)dd.value="500 GB";
		if (op.selectedIndex==6)ram.value="8 GB";
		
	}
	
	if(op1){
		if (op1.selectedIndex==0)proc.value="Intel Pentium D 2.80 GHZ";
		if (op1.selectedIndex==0)dd.value="80 GB";
		if (op1.selectedIndex==0)ram.value="512 MB";
		
		if (op1.selectedIndex==1)proc.value="Intel Pentium Dual CPU E2160 1.80 GHZ";
		if (op1.selectedIndex==1)dd.value="160 GB";
		if (op1.selectedIndex==1)ram.value="1 GB";
		
		if (op1.selectedIndex==2)proc.value="Intel Pentium Core TM 2 duo CPU E7400 1.80 GHZ";
		if (op1.selectedIndex==2)dd.value="300 GB";
		if (op1.selectedIndex==2)ram.value="2 GB";
		
		if (op1.selectedIndex==3)proc.value="Intel Core i3 CPU 2100 3.10 GHZ";
		if (op1.selectedIndex==3)dd.value="300 GB";
		if (op1.selectedIndex==3)ram.value="8 GB";
		
		if (op1.selectedIndex==4)proc.value="Intel Core i3-4130T CPU 2.90 GHZ";
		if (op1.selectedIndex==4)dd.value="500 GB";
		if (op1.selectedIndex==4)ram.value="8 GB";
		
		if (op1.selectedIndex==5)proc.value="AMD A8 PRO 7600B R7";
		if (op1.selectedIndex==5)dd.value="500 GB";
		if (op1.selectedIndex==5)ram.value="8 GB";
		
		if (op1.selectedIndex==6)proc.value="";
		if (op1.selectedIndex==6)dd.value="";
		if (op1.selectedIndex==6)ram.value="";
		
		
	}
	
	if(op2){
		if (op2.selectedIndex==0)proc.value="Intel Pentium Dual CPU E2160 1.80 GHZ";
		if (op2.selectedIndex==0)dd.value="160 GB";
		if (op2.selectedIndex==0)ram.value="1 GB";
		
		if (op2.selectedIndex==1)proc.value="Intel Pentium Core TM 2 duo CPU E7400 1.80 GHZ";
		if (op2.selectedIndex==1)dd.value="300 GB";
		if (op2.selectedIndex==1)ram.value="2 GB";
		
		if (op2.selectedIndex==2)proc.value="Intel Core i3 CPU 2100 3.10 GHZ";
		if (op2.selectedIndex==2)dd.value="300 GB";
		if (op2.selectedIndex==2)ram.value="8 GB";
		
		if (op2.selectedIndex==3)proc.value="Intel Core i3-4130T CPU 2.90 GHZ";
		if (op2.selectedIndex==3)dd.value="500 GB";
		if (op2.selectedIndex==3)ram.value="8 GB";
		
		if (op2.selectedIndex==4)proc.value="AMD A8 PRO 7600B R7";
		if (op2.selectedIndex==4)dd.value="500 GB";
		if (op2.selectedIndex==4)ram.value="8 GB";
		
		if (op2.selectedIndex==5)proc.value="";
		if (op2.selectedIndex==5)dd.value="";
		if (op2.selectedIndex==5)ram.value="";
		
		if (op2.selectedIndex==5)proc.value="Intel Pentium D 2.80 GHZ";
		if (op2.selectedIndex==5)dd.value="80 GB";
		if (op2.selectedIndex==5)ram.value="512 MB";
		
	}
		
	if(op3){
		
		if (op3.selectedIndex==0)proc.value="Intel Pentium Core TM 2 duo CPU E7400 1.80 GHZ";
		if (op3.selectedIndex==0)dd.value="300 GB";
		if (op3.selectedIndex==0)ram.value="2 GB";
		
		if (op3.selectedIndex==1)proc.value="Intel Core i3 CPU 2100 3.10 GHZ";
		if (op3.selectedIndex==1)dd.value="300 GB";
		if (op3.selectedIndex==1)ram.value="8 GB";
		
		if (op3.selectedIndex==2)proc.value="Intel Core i3-4130T CPU 2.90 GHZ";
		if (op3.selectedIndex==2)dd.value="500 GB";
		if (op3.selectedIndex==2)ram.value="8 GB";
		
		if (op3.selectedIndex==3)proc.value="AMD A8 PRO 7600B R7";
		if (op3.selectedIndex==3)dd.value="500 GB";
		if (op3.selectedIndex==3)ram.value="8 GB";
		
		if (op3.selectedIndex==4)proc.value="";
		if (op3.selectedIndex==4)dd.value="";
		if (op3.selectedIndex==4)ram.value="";
		
		if (op3.selectedIndex==5)proc.value="Intel Pentium D 2.80 GHZ";
		if (op3.selectedIndex==5)dd.value="80 GB";
		if (op3.selectedIndex==5)ram.value="512 MB";
		
		if (op3.selectedIndex==6)proc.value="Intel Pentium Dual CPU E2160 1.80 GHZ";
		if (op3.selectedIndex==6)dd.value="160 GB";
		if (op3.selectedIndex==6)ram.value="1 GB";
		
	}	
	
	if(op4){
		
		if (op4.selectedIndex==0)proc.value="Intel Core i3 CPU 2100 3.10 GHZ";
		if (op4.selectedIndex==0)dd.value="300 GB";
		if (op4.selectedIndex==0)ram.value="8 GB";
		
		if (op4.selectedIndex==1)proc.value="Intel Core i3-4130T CPU 2.90 GHZ";
		if (op4.selectedIndex==1)dd.value="500 GB";
		if (op4.selectedIndex==1)ram.value="8 GB";
		
		if (op4.selectedIndex==2)proc.value="AMD A8 PRO 7600B R7";
		if (op4.selectedIndex==2)dd.value="500 GB";
		if (op4.selectedIndex==2)ram.value="8 GB";
		
		if (op4.selectedIndex==3)proc.value="";
		if (op4.selectedIndex==3)dd.value="";
		if (op4.selectedIndex==3)ram.value="";
		
		if (op4.selectedIndex==4)proc.value="Intel Pentium D 2.80 GHZ";
		if (op4.selectedIndex==4)dd.value="80 GB";
		if (op4.selectedIndex==4)ram.value="512 MB";
		
		if (op4.selectedIndex==5)proc.value="Intel Pentium Dual CPU E2160 1.80 GHZ";
		if (op4.selectedIndex==5)dd.value="160 GB";
		if (op4.selectedIndex==5)ram.value="1 GB";
		
		if (op4.selectedIndex==6)proc.value="Intel Pentium Core TM 2 duo CPU E7400 1.80 GHZ";
		if (op4.selectedIndex==6)dd.value="300 GB";
		if (op4.selectedIndex==6)ram.value="2 GB";
		
	}
	
	if(op5){
		
		if (op5.selectedIndex==0)proc.value="Intel Core i3-4130T CPU 2.90 GHZ";
		if (op5.selectedIndex==0)dd.value="500 GB";
		if (op5.selectedIndex==0)ram.value="8 GB";
		
		if (op5.selectedIndex==1)proc.value="AMD A8 PRO 7600B R7";
		if (op5.selectedIndex==1)dd.value="500 GB";
		if (op5.selectedIndex==1)ram.value="8 GB";
		
		if (op5.selectedIndex==2)proc.value="";
		if (op5.selectedIndex==2)dd.value="";
		if (op5.selectedIndex==2)ram.value="";
		
		if (op5.selectedIndex==3)proc.value="Intel Pentium D 2.80 GHZ";
		if (op5.selectedIndex==3)dd.value="80 GB";
		if (op5.selectedIndex==3)ram.value="512 MB";
		
		if (op5.selectedIndex==4)proc.value="Intel Pentium Dual CPU E2160 1.80 GHZ";
		if (op5.selectedIndex==4)dd.value="160 GB";
		if (op5.selectedIndex==4)ram.value="1 GB";
		
		if (op5.selectedIndex==5)proc.value="Intel Pentium Core TM 2 duo CPU E7400 1.80 GHZ";
		if (op5.selectedIndex==5)dd.value="300 GB";
		if (op5.selectedIndex==5)ram.value="2 GB";
		
		if (op5.selectedIndex==6)proc.value="Intel Core i3 CPU 2100 3.10 GHZ";
		if (op5.selectedIndex==6)dd.value="300 GB";
		if (op5.selectedIndex==6)ram.value="8 GB";
		
	}
	
	if(op6){
				
		if (op6.selectedIndex==0)proc.value="AMD A8 PRO 7600B R7";
		if (op6.selectedIndex==0)dd.value="500 GB";
		if (op6.selectedIndex==0)ram.value="8 GB";
		
		if (op6.selectedIndex==1)proc.value="";
		if (op6.selectedIndex==1)dd.value="";
		if (op6.selectedIndex==1)ram.value="";
		
		if (op6.selectedIndex==2)proc.value="Intel Pentium D 2.80 GHZ";
		if (op6.selectedIndex==2)dd.value="80 GB";
		if (op6.selectedIndex==2)ram.value="512 MB";
		
		if (op6.selectedIndex==3)proc.value="Intel Pentium Dual CPU E2160 1.80 GHZ";
		if (op6.selectedIndex==3)dd.value="160 GB";
		if (op6.selectedIndex==3)ram.value="1 GB";
		
		if (op6.selectedIndex==4)proc.value="Intel Pentium Core TM 2 duo CPU E7400 1.80 GHZ";
		if (op6.selectedIndex==4)dd.value="300 GB";
		if (op6.selectedIndex==4)ram.value="2 GB";
		
		if (op6.selectedIndex==5)proc.value="Intel Core i3 CPU 2100 3.10 GHZ";
		if (op6.selectedIndex==5)dd.value="300 GB";
		if (op6.selectedIndex==5)ram.value="8 GB";
		
		if (op6.selectedIndex==6)proc.value="Intel Core i3-4130T CPU 2.90 GHZ";
		if (op6.selectedIndex==6)dd.value="500 GB";
		if (op6.selectedIndex==6)ram.value="8 GB";
		
	}
	
	
	
}