// JavaScript Document

function selecOp()
{
	var op=document.getElementById("modelo_pc");
	var proc=document.getElementById("procesador");
	var dd=document.getElementById("disco_duro");
	var ram=document.getElementById("ram");
	
	if (op.selectedIndex==0)proc.value="";
	if (op.selectedIndex==0)dd.value="";
	if (op.selectedIndex==0)ram.value="";
	
	if (op.selectedIndex==1)proc.value="";
	if (op.selectedIndex==1)dd.value="";
	if (op.selectedIndex==1)ram.value="";
	
	if (op.selectedIndex==2)proc.value="Intel Pentium D 2.80 GHZ";
	if (op.selectedIndex==2)dd.value="80 GB";
	if (op.selectedIndex==2)ram.value="512 MB";
	
	if (op.selectedIndex==3)proc.value="Intel Pentium Dual CPU E2160 1.80 GHZ";
	if (op.selectedIndex==3)dd.value="160 GB";
	if (op.selectedIndex==3)ram.value="1 GB";

	if (op.selectedIndex==4)proc.value="Intel Pentium Core TM 2 duo CPU E7400 1.80 GHZ";
	if (op.selectedIndex==4)dd.value="300 GB";
	if (op.selectedIndex==4)ram.value="2 GB";
	
	if (op.selectedIndex==5)proc.value="Intel Core i3 CPU 2100 3.10 GHZ";
	if (op.selectedIndex==5)dd.value="300 GB";
	if (op.selectedIndex==5)ram.value="8 GB";
	
	if (op.selectedIndex==6)proc.value="Intel Core i3-4130T CPU 2.90 GHZ";
	if (op.selectedIndex==6)dd.value="500 GB";
	if (op.selectedIndex==6)ram.value="8 GB";
	
	if (op.selectedIndex==7)proc.value="AMD A8 PRO 7600B R7";
	if (op.selectedIndex==7)dd.value="500 GB";
	if (op.selectedIndex==7)ram.value="8 GB";

}