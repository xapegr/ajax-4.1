function Review ()
{
	//Attributes declaration
	this.id;
	this.idUser;
	this.rate;
	this.opinion;


	//Methods declaration
	this.construct = function (id,idUser,rate,opinion)
	{
		this.setId(id);		;
		this.setIdFilm(idFilm);
		this.setRate(rate);
		this.setopinion(opinion);
	}

	this.setId = function (id){this.id=id;}
	this.setRate = function (rate){this.rate=rate;}
	this.setOpinion = function (description){this.description=description;}
	this.setIdUser = function (idFilm){this.idFilm=idFilm;}

	this.getId = function () {return this.id;}
	this.getRate = function () {return this.rate;}
	this.getOpinion = function () {return this.opinion;}
	this.getIdUser = function () {return this.idUser;}


	this.arrayToString = function (arrayReview)
	{
		var reviewString ="";
		$.each(arrayReview, function (index, review){
			reviewString+="reiew number "+(index+1)+":"+review.toString()+"\n";
		});
		return reviewString;
	}

	this.toString = function ()
	{
		var reviewString ="id="+this.getId()+" rate="+this.getRate()+" opinion="+this.getOpinion()+" idUser="+this.getIdUser();

		return reviewString;
	}
}
