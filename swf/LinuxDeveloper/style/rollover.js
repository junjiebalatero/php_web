// 0 == standard
// 1 == rollover
// 2 == clicked

home0 = new Image(65,20);
home0.src = "themes/LinuxDeveloper/images/tabs/tab-home-normal.gif";
learn0 = new Image(68,20);
learn0.src = "themes/LinuxDeveloper/images/tabs/tab-aboutus-normal.gif";
enhance0 = new Image(67,20);
enhance0.src = "themes/LinuxDeveloper/images/tabs/tab-learn-normal.gif";


home1 = new Image(65,20);
home1.src = "themes/LinuxDeveloper/images/tabs/tab-home-selected.gif";
learn1 = new Image(68,20);
learn1.src = "themes/LinuxDeveloper/images/tabs/tab-aboutus-selected.gif";
enhance1 = new Image(67,20);
enhance1.src = "themes/LinuxDeveloper/images/tabs/tab-learn-selected.gif";


home2 = new Image(65,20);
home2.src = "themes/LinuxDeveloper/images/tabs/tab-home-selected.gif";
learn2 = new Image(68,20);
learn2.src = "themes/LinuxDeveloper/images/tabs/tab-aboutus-selected.gif";
enhance2 = new Image(67,20);
enhance2.src = "themes/LinuxDeveloper/images/tabs/tab-learn-selected.gif";


function swapImage(imageToSwap, imageToDisplay) {
	imageToSwap.src = imageToDisplay.src;
}
