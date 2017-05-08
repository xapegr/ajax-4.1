/* @name:
 * @author:
 * @date:
 * @description:
 * @Attributes:
 * 		id: identification of food in stock
 * 		.
 * 		.
 *		.
 * @methods:
 * 		construct
 * 		set's and get's foor each attribute
 *
 *
 *
*/
function Application ()
{
	//Attributes declaration
	this.id;
  this.idUser;
	this.position;//array with positions in company
	this.startDate;
	this.web;
	this.salary;
	this.hobbies = new Array();//array with hobbies
	this.relocate;//bolean yes/no
  this.reasons;//text area


	//Methods declaration
	this.construct = function (id,idUser,position,startDate,web,salary,hobbies,relocate,reasons)
	{
		this.setId(id);
		this.setIdUser(idUser);
		this.setPosition(position);
		this.setStartDate(startDate);
		this.setWeb(web);
		this.setSalary(salary);
		this.setHobbies(hobbies);
		this.setRelocate(relocate);
		this.setReasons(reasons);
	}

	this.setId = function (id){this.id=id;}
	this.setIdUser = function (idUser){this.idUser=idUser;}
	this.setPosition = function (position){this.position=position;}
	this.setStartDate = function (startDate){this.startDate=startDate;}
	this.setWeb = function (web){this.web=web;}
	this.setSalary = function (salary){this.salary=salary;}
	this.setHobbies = function (hobbies){this.hobbies=hobbies;}
	this.setRelocte = function (relocate){this.relocate=relocate;}
	this.setReasons = function (reasons){this.reasons=reasons;}

	this.getId = function () {return this.id;}
	this.getIdUser = function (){return this.idUser;}
	this.getPosition = function () {return this.position;}
	this.getStartDate = function () {return this.startDate;}
	this.getWeb = function () {return this.web;}
	this.getSalary = function () {return this.salary;}
	this.getHobbies = function () {return this.hobbies;}
	this.getRelocte = function () {return this.relocate;}
	this.getReasons = function () {return this.reasons;}

	this.arrayToString = function (arrayApps)
	{
		var appString ="";
		$.each(arrayApps, function (index, app){
			appString+="app number "+(index+1)+":"+app.toString()+"\n";
		});
		return appString;

	}

	this.toString = function ()
	{
		var appString ="id="+this.getId()+" position="+this.getPosition()+" idUser="+this.getIdUser()+" startDate="+this.getStartDate();
		appString +=" web="+this.getWeb()+" salary="+this.getSalary();
    //+" hobbies="+this.getInSale()+" rented="+this.getRented()+" reviews=";

		/*var review = new reviewObj();
		appString +=review.arrayToString(this.getReviews());
    */
		return appString;
	}
}
