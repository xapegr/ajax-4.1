function User()
{
    //Attributes declaration
    this.id;
    this.name;
    this.surname1;
    this.nick;
    this.password;
    this.rol;
    this.address;
    this.telephone;
    this.mail;
    this.birthDate;
    this.entryDate;
    this.dropOutDate;
    this.active;
    this.image;

    //methods declaration
    this.construct = function (id, name, surname1, nick, password,rol, address, telephone, mail, birthDate, entryDate, dropOutDate, active, image)
    {
        this.setId(id);
        this.setName(name);
        this.setSurname1(surname1);
		    this.setNick(nick);
		    this.setPassword(password);
        this.setRol(rol);
        this.setAddress(address);
        this.setTelephone(telephone);
        this.setMail(mail);
        this.setBirthDate(birthDate);
    		this.setEntryDate(entryDate);
    		this.setDropOutDate(dropOutDate);
    		this.setActive(active);
    		this.setImage(image);
    }

    //setters
    this.setId = function (id) {this.id=id;}
    this.setName = function (name) {this.name=name;}
    this.setSurname1 = function (surname1) {this.surname1=surname1;}
    this.setNick = function (nick) {this.nick=nick;}
    this.setPassword = function (password) {this.password=password;}
    this.setRol = function (rol) {this.rol=rol;}
    this.setAddress = function (address) {this.address=address;}
    this.setTelephone = function (telephone) {this.telephone=telephone;}
    this.setMail = function (mail) {this.mail=mail;}
    this.setBirthDate = function (birthDate) {this.birthDate=birthDate;}
    this.setEntryDate = function (entryDate) {this.entryDate=entryDate;}
    this.setDropOutDate = function (dropOutDate) {this.dropOutDate=dropOutDate;}
    this.setActive = function (active) {this.active=active;}
    this.setImage = function (image) {this.image=image;}

    //getters
    this.getId = function () {return this.id;}
    this.getName = function () {return this.name;}
    this.getSurname1 = function () {return this.surname1;}
    this.getNick = function () {return this.nick;}
    this.getPassword = function () {return this.password;}
    this.getRol = function () {return this.rol;}
    this.getAddress = function () {return this.address;}
    this.getTelephone = function () {return this.telephone;}
    this.getMail = function () {return this.mail;}
    this.getBirthDate = function () {return this.birthDate;}
    this.getEntryDate = function () {return this.entryDate;}
    this.getDropOutDate = function () {return this.dropOutDate;}
    this.getActive = function () {return this.active;}
    this.getImage = function () {return this.image;}

    /*
    * @name: toString()
    * @author: Cristian Garcia && Sofiane
    * @version: 3.1
    * @description: convert object to string
    * @date: 04/03/2015
   */
    this.toString = function ()
    {
	var userString ="id="+this.getId()+" name="+this.getName()+" surname="+this.getSurname1();
	userString +=" nick="+this.getNick()+"rol="+this.getRol()+" password="+this.getPassword()+" telephone="+this.getTelephone()+" mail="+this.getMail();
	userString +=" birth date="+this.getBirthDate()+" up date="+this.getEntryDate()+" out date="+this.getDropOutDate()+" active="+this.getActive()+" image="+this.getImage();

	return userString;
    }
}
