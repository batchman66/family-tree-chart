family-tree-chart
=================

Example - This chart is shown from clicking "Father's side" or "Mother's side" on familymain.php from www.kcorina.com.

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
