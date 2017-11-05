// JavaScript Document

function setOptions2(chosen) {
var selbox = document.savecomplain2.coursecode;


selbox.options.length = 0;
if (chosen == " ") {
  selbox.options[selbox.options.length] = new Option('Select course first',' ');
 
}
if (chosen == "BIS") {
  selbox.options[selbox.options.length] = new
Option('-choose course code-','');	
  selbox.options[selbox.options.length] = new
Option('MC1100-communication skills','MC1100');
  selbox.options[selbox.options.length] = new
Option('CS1101-introduction to comp','CS1101');
	selbox.options[selbox.options.length] = new
Option('CI1101-digital logic','CI1101');
selbox.options[selbox.options.length] = new
Option('CS1102-discrete math','CS1102');
  selbox.options[selbox.options.length] = new
Option('CS1103-computer applications','CS1103');
	selbox.options[selbox.options.length] = new
Option('CS1104-computer programming methodology','CS1104');

selbox.options[selbox.options.length] = new
Option('IT1202-internet and ecommerce','IT1202');
  selbox.options[selbox.options.length] = new
Option('CS1202-computer organsation','CS1202');
	selbox.options[selbox.options.length] = new
Option('CS1201-computer progrmming in c','CS1201');
selbox.options[selbox.options.length] = new
Option('CS1204-descrete math II','CS1204');
  selbox.options[selbox.options.length] = new
Option('CS1203-intro to principles of statistics','CS1203');
	selbox.options[selbox.options.length] = new
Option('IT1201-internet tech and webpage authoring','IT1201');

selbox.options[selbox.options.length] = new
Option('CS2101-object oriented programming c++','CS2101');
  selbox.options[selbox.options.length] = new
Option('IS2101-info systems fundamentals','IS2101');
	selbox.options[selbox.options.length] = new
Option('IS2102-info use and mgt','IS2102');
selbox.options[selbox.options.length] = new
Option('IS2103-info systems design with ESB','IS2103');
  selbox.options[selbox.options.length] = new
Option('IT2101-database planning,design and mgt','IT2101');
	selbox.options[selbox.options.length] = new
Option('CS2103-system analysis and design','CS2103');

selbox.options[selbox.options.length] = new
Option('IS2202-business info & software fundametals','IS2202');
  selbox.options[selbox.options.length] = new
Option('IS2201-organzational & business info processes','IS2201');
	selbox.options[selbox.options.length] = new
Option('IT2202-application dev with VB I','IT2202');
selbox.options[selbox.options.length] = new
Option('IT2201-web-design,pregramming and admnistration','IT2201');
  selbox.options[selbox.options.length] = new
Option('CI2202-computer networks & data communications','CI2202');
	selbox.options[selbox.options.length] = new
Option('CS2202-research methodology in comp sci','CS2202');


  selbox.options[selbox.options.length] = new
Option('IS3101-info systems dev studio I','IS3101');
	selbox.options[selbox.options.length] = new
Option('IS3102-e-business information systems','IS3102');
selbox.options[selbox.options.length] = new
Option('IT3101-web-based database development','IT3101');
  selbox.options[selbox.options.length] = new
Option('CS3102-operating system','CS3102');
	selbox.options[selbox.options.length] = new
Option('IS3103-information mgt in org','IS3103');

selbox.options[selbox.options.length] = new
Option('IS3206-info systems dev studio II','IS3206');
  selbox.options[selbox.options.length] = new
Option('IS3203-infrastructure for e-commerce','IS3203');
	selbox.options[selbox.options.length] = new
Option('IS3202-social issues in computing','IS3202');
selbox.options[selbox.options.length] = new
Option('IT3201-software modelling with uml','IT3201');
  selbox.options[selbox.options.length] = new
Option('IT3203-application dev with VB II','IT3203');

  	
}
if (chosen == "BCS") {
  selbox.options[selbox.options.length] = new
Option('-choose your year of study-','');	


 
}
if (chosen == "BIT") {
   selbox.options[selbox.options.length] = new
Option('-choose your year of study-','');
 


}
if (chosen == "BCI") {
   selbox.options[selbox.options.length] = new
Option('-choose your year of study-','');	
   


}

}
