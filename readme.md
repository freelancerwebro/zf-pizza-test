# Pizza Test

## Installing the virtual development machine
This is the quickest way to get started with the Pizza Test from Vendo. 
If you already have Vagrant and VirtualBox installed you can skip the next steps.
You can also work with the Pizza Test without the included virtual development machine, but you have to configure everything yourself.
_NB: Only Mac and Linux host machines 100% supported. If you're on Windows you're on your own..._

### Install Vagrant (HashiCorp)
_Vagrant by HashiCorp is a piece of software that enables you to automatically launch and provision virtual machines on different hypervisor providers using simple scripts._

Download installation file here (pick the one that matches your host machine environment):

    https://www.vagrantup.com/downloads.html (tested with 1.9.4)

### Install VirtualBox (Oracle)
_VirtualBox from Oracle is a virtual machine hypervisor, i.e. a piece of software that is able to simulate a complete computer._

Download installation file here (pick the one that matches your host machine environment):

    https://www.virtualbox.org/wiki/Downloads (tested with 5.1.22)

### Edit hosts file on you host machine
_The hosts file enables your computer to find websites that do not have a public DNS entry_

Add the following to /etc/hosts:

    192.168.16.21	pizzatest.vendo.local
        
### Start the virtual machine

To launch the virtual development matchine, execute the following command from the Pizza Test directory:

    vagrant up

### Visit the Pizza Test website

Type http://pizzatest.vendo.local in your browser.

You should see a skeleton website with the message:

    Nice! You're set, good luck with the test.
