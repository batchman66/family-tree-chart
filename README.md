family-tree-chart
=================

chart.php
=========

Example - This chart is shown from clicking "Father's side" or "Mother's side" on www.kcorina.com/familymain.php.

This code builds the family tree chart of my ancestors. Initially the leftmost box would be my father or mother,
depending on which button the user pressed on the familymain.php. The page will show my mother's or father's parents,
grandparents and great grandparents. If I have ancestors beyond their great grandparents there will be a more link next
to the great grandparents box. If the user clicks the link, a new page will be displayed with the leftmost box now
being occupied by the great grandparent. When the user clicks on any box, they will be sent to the information page for
that person.


MySQL table - person 

Column	/		Type		/			Description

id		  /    int(10)		/    Primary Key       
fname		/    varchar(50)	 / First Name		 	 
lname		/    varchar(100)	/ Last Name	 	 
direct	/	  varchar(1)	/  Direct Ancestor (Y or N) 	 	 
level		 / int(11)	 /   Ancestry Level (1 = Your Parents, 2 = Your Grandparents, 3 = Your Great Grandparents, etc.) 	 
side		/  varchar(1)	/  Side (F = father, M = mother) 	 	 
birthdate	/  date	 	   /   Birth Date  	 
birthplace /	varchar(100)	/ Place of Birth 	 	 
deathdate	/  date		  /    Death Date 	 
deathplace /	varchar(100) /	Place of Death	 	 
fatherid	/  int(11)	 	 /   index of current person's father 	 
motherid	/  int(11)	 	 /   index of current person's mother 	 

personinfo.php
==============

Someone has clicked a box in chart.php to get more information on the person whose name is in that box. A new page will
display this person's marriage, wife's name, siblings, parents and documents (if any). The user can click on any name to
get more information on them as well. If document is selected, it will pop-up on the page.

MySQL tables

1) person - see under chart.php

2) marriage 

Column / Type	/ Description
id /	int(10)	 / Primary Key	 	 
husbandid	/ int(11) / index of husband on person table	 	 
date /	date / date of wedding 	 	 
place	/ varchar(100) / lacation of wedding 	 	 
wifeid /	int(11)	 / index of wife on person table 	 
divorcedate /	date / date of divorce

3) document

Column / Type	/ Description
id	/ int(10)	/ Primary Key 	 	 
personid	/ int(11)	/ index of current person on person table	 	 
record	/ mediumblob	/ image of document 	 	 
title	/ varchar(100) / document title (birth record, census record, etc.)	 	 
description	/ text / description of document

