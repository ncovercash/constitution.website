<?php

define("ROOTDIR", "../../");
define("REAL_ROOTDIR", "../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", "learn");
define("PAGE_TITLE", Values::createTitle("Constitution | Learn", []));

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("Constitution");
?>
			<div class="row"><div class="col s12 m9 l10">
				<div class="section hide-on-med-and-up">
<?= Values::createInlineTOC([
	["preamble", "Preamble"],
	["article-i-section-1", "Article I Section 1"],
	["article-i-section-2", "Article I Section 2"],
	["article-i-section-3", "Article I Section 3"],
	["article-i-section-4", "Article I Section 4"],
	["article-i-section-5", "Article I Section 5"],
	["article-i-section-6", "Article I Section 6"],
	["article-i-section-7", "Article I Section 7"],
	["article-i-section-8", "Article I Section 8"],
	["article-i-section-9", "Article I Section 9"],
	["article-i-section-10", "Article I Section 10"],
	["article-ii-section-1", "Article II Section 1"],
	["article-ii-section-2", "Article II Section 2"],
	["article-ii-section-3", "Article II Section 3"],
	["article-ii-section-4", "Article II Section 4"],
	["article-iii-section-1", "Article III Section 1"],
	["article-iii-section-2", "Article III Section 2"],
	["article-iii-section-3", "Article III Section 3"],
	["article-iv-section-1", "Article IV Section 1"],
	["article-iv-section-2", "Article IV Section 2"],
	["article-iv-section-3", "Article IV Section 3"],
	["article-iv-section-4", "Article IV Section 4"],
	["article-v", "Article V"],
	["article-vi", "Article VI"],
	["article-vii", "Article VII"],
	["resources", "Resources"],
]) ?>
				</div>
				<div class="divider hide-on-med-and-up"></div>
				<div class="section" id="preamble">
					<h4>Preamble</h4>

					<blockquote>
						We the People of the United States, in Order to form a more perfect Union, establish Justice, insure domestic Tranquility, provide for the common defence, promote the general Welfare, and secure the Blessings of Liberty to ourselves and our Posterity, do ordain and establish this Constitution for the United States of America.
					</blockquote>

					<p class="flow-text no-bottom-margin">
						The Preamble states the intentions of the Constitution:
					</p>
					<ul class="flow-text browser-default no-top-margin">
						<li>to form a more perfect union,</li>
						<li>establish justice,</li>
						<li>insure domestic tranquility (peace),</li>
						<li>provide for the common defense (safety),</li>
						<li>promote the general welfare, and</li>
						<li>secure the blessings of Liberty to ourselves and our children.</li>
					</ul>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-i-section-1">
					<h4>Article I Section 1</h4>

					<blockquote>
						All legislative Powers herein granted shall be vested in a Congress of the United States, which shall consist of a Senate and House of Representatives.
					</blockquote>

					<p class="flow-text">
						The Congress should consist of a Senate and House of Representatives, and carry out the powers stated in the rest of Article I.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-i-section-2">
					<h4>Article I Section 2</h4>

					<blockquote>
						<ol>
							<li>The House of Representatives shall be composed of Members chosen every second Year by the People of the several States, and the Electors in each State shall have the Qualifications requisite for Electors of the most numerous Branch of the State Legislature.</li>
							<li>No Person shall be a Representative who shall not have attained to the Age of twenty five Years, and been seven Years a Citizen of the United States, and who shall not, when elected, be an Inhabitant of that State in which he shall be chosen.</li>
							<li>Representatives and direct Taxes shall be apportioned among the several States which may be included within this Union, according to their respective Numbers, which shall be determined by adding to the whole Number of free Persons, including those bound to Service for a Term of Years, and excluding Indians not taxed, three fifths of all other Persons. The actual Enumeration shall be made within three Years after the first Meeting of the Congress of the United States, and within every subsequent Term of ten Years, in such Manner as they shall by Law direct.The number of Representatives shall not exceed one for every thirty Thousand, but each State shall have at Least one Representative; and until such enumeration shall be made, the State of New Hampshire shall be entitled to chuse three, Massachusetts eight, Rhode-Island and Providence Plantations one, Connecticut five, New-York six, New Jersey four, Pennsylvania eight, Delaware one, Maryland six, Virginia ten, North Carolina five, South Carolina five, and Georgia three.</li>
							<li>When vacancies happen in the Representation from any State, the Executive Authority thereof shall issue Writs of Election to fill such Vacancies.</li>
							<li>The House of Representatives shall chuse their Speaker and other Officers; and shall have the sole Power of Impeachment.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section describes the House of Representatives, a representative's requirements and term length, the election process for representatives, the determination of the number of representatives in a given state, and the process of selecting officers.  It also gives the House the power of impeachment.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-i-section-3">
					<h4>Article I Section 3</h4>

					<blockquote>
						<ol>
							<li>The Senate of the United States shall be composed of two Senators from each State, chosen by the Legislature thereof, for six Years; and each Senator shall have one Vote.</li>
							<li>Immediately after they shall be assembled in Consequence of the first Election, they shall be divided as equally as may be into three Classes. The Seats of the Senators of the first Class shall be vacated at the Expiration of the second Year, of the second Class at the Expiration of the fourth Year, and of the third Class at the Expiration of the sixth Year, so that one third may be chosen every second Year; and if Vacancies happen by Resignation, or otherwise, during the Recess of the Legislature of any State, the Executive thereof may make temporary Appointments until the next Meeting of the Legislature, which shall then fill such Vacancies.</li>
							<li>No Person shall be a Senator who shall not have attained to the Age of thirty Years, and been nine Years a Citizen of the United States, and who shall not, when elected, be an Inhabitant of that State for which he shall be chosen.</li>
							<li>The Vice President of the United States shall be President of the Senate, but shall have no Vote, unless they be equally divided.</li>
							<li>The Senate shall chuse their other Officers, and also a President pro tempore, in the Absence of the Vice President, or when he shall exercise the Office of President of the United States.</li>
							<li>The Senate shall have the sole Power to try all Impeachments. When sitting for that Purpose, they shall be on Oath or Affirmation. When the President of the United States is tried, the Chief Justice shall preside: And no Person shall be convicted without the Concurrence of two thirds of the Members present.</li>
							<li>Judgment in Cases of Impeachment shall not extend further than to removal from Office, and disqualification to hold and enjoy any Office of honor, Trust or Profit under the United States: but the Party convicted shall nevertheless be liable and subject to Indictment, Trial, Judgment and Punishment, according to Law.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section describes the Senate, a senator's requirements and term length, the election process for senators, the Vice President's role, and the Senate's role in impeachment.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-i-section-4">
					<h4>Article I Section 4</h4>

					<blockquote>
						<ol>
							<li>The Times, Places and Manner of holding Elections for Senators and Representatives, shall be prescribed in each State by the Legislature thereof; but the Congress may at any time by Law make or alter such Regulations, except as to the Places of chusing Senators.</li>
							<li>The Congress shall assemble at least once in every Year, and such Meeting shall be on the first Monday in December, unless they shall by Law appoint a different Day</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section states that each state may decide how and when to elect members of Congress, however, the federal Congress may supersede these decisions (with the exception of election locations).  Additionally, it states when Congress will convene each year.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-i-section-5">
					<h4>Article I Section 5</h4>

					<blockquote>
						<ol>
							<li>Each House shall be the Judge of the Elections, Returns and Qualifications of its own Members,and a Majority of each shall constitute a Quorum to do Business; but a smaller Number may adjourn from day to day, and may be authorized to compel the Attendance of absent Members, in such Manner, and under such Penalties as each House may provide.</li>
							<li>Each House may determine the Rules of its Proceedings, punish its Members for disorderly Behaviour, and, with the Concurrence of two thirds, expel a Member.</li>
							<li>Each House shall keep a Journal of its Proceedings, and from time to time publish the same, excepting such Parts as may in their Judgment require Secrecy; and the Yeas and Nays of the Members of either House on any question shall, at the Desire of one fifth of those Present, be entered on the Journal.</li>
							<li>Neither House, during the Session of Congress, shall, without the Consent of the other, adjourn for more than three days, nor to any other Place than that in which the two Houses shall be sitting.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section states the "rules" of the two houses, stating that they are responsible for their attendance, rules, punishments, and, if necessary, expulsion.  Additionally, it states that each house should keep a journal of its proceedings and votes, publishing it occasionally.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-i-section-6">
					<h4>Article I Section 6</h4>

					<blockquote>
						<ol>
							<li>The Senators and Representatives shall receive a Compensation for their Services, to be ascertained by Law, and paid out of the Treasury of the United States.They shall in all Cases, except Treason, Felony and Breach of the Peace, be privileged from Arrest during their Attendance at the Session of their respective Houses, and in going to and returning from the same; and for any Speech or Debate in either House, they shall not be questioned in any other Place.</li>
							<li>No Senator or Representative shall, during the Time for which he was elected, be appointed to any civil Office under the Authority of the United States, which shall have been created, or the Emoluments whereof shall have been encreased during such time; and no Person holding any Office under the United States, shall be a Member of either House during his Continuance in Office.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section dictates the payment of members of Congress, as well as certain privileges and restrictions upon them.  It states that they cannot be arrested while in session (except for treason), nor be questioned directly while in a speech or debate.  Additionally, they may not hold any other offices at the same time.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-i-section-7">
					<h4>Article I Section 7</h4>

					<blockquote>
						<ol>
							<li>All Bills for raising Revenue shall originate in the House of Representatives; but the Senate may propose or concur with Amendments as on other Bills.</li>
							<li>Every Bill which shall have passed the House of Representatives and the Senate, shall, before it become a Law, be presented to the President of the United States; If he approve he shall sign it, but if not he shall return it, with his Objections to that House in which it shall have originated, who shall enter the Objections at large on their Journal, and proceed to reconsider it. If after such Reconsideration two thirds of that House shall agree to pass the Bill, it shall be sent, together with the Objections, to the other House, by which it shall likewise be reconsidered, and if approved by two thirds of that House, it shall become a Law. But in all such Cases the Votes of both Houses shall be determined by Yeas and Nays, and the Names of the Persons voting for and against the Bill shall be entered on the Journal of each House respectively. If any Bill shall not be returned by the President within ten Days (Sundays excepted) after it shall have been presented to him, the Same shall be a Law, in like Manner as if he had signed it, unless the Congress by their Adjournment prevent its Return, in which Case it shall not be a Law.</li>
							<li>Every Order, Resolution, or Vote to which the Concurrence of the Senate and House of Representatives may be necessary (except on a question of Adjournment) shall be presented to the President of the United States; and before the Same shall take Effect, shall be approved by him, or being disapproved by him, shall be repassed by two thirds of the Senate and House of Representatives, according to the Rules and Limitations prescribed in the Case of a Bill.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section both states the process of a bill becoming a law (and the differences for revenue-based bills) and describes the veto and veto override processes.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-i-section-8">
					<h4>Article I Section 8</h4>

					<blockquote>
						<ol>
							<li>The Congress shall have Power To lay and collect Taxes, Duties, Imposts and Excises, to pay the Debts and provide for the common Defence and general Welfare of the United States; but all Duties, Imposts and Excises shall be uniform throughout the United States;</li>
							<li>To borrow Money on the credit of the United States;</li>
							<li>To regulate Commerce with foreign Nations, and among the several States, and with the Indian Tribes;</li>
							<li>To establish an uniform Rule of Naturalization, and uniform Laws on the subject of Bankruptcies throughout the United States;</li>
							<li>To coin Money, regulate the Value thereof, and of foreign Coin, and fix the Standard of Weights and Measures;</li>
							<li>To provide for the Punishment of counterfeiting the Securities and current Coin of the United States;</li>
							<li>To establish Post Offices and post Roads;</li>
							<li>To promote the Progress of Science and useful Arts, by securing for limited Times to Authors and Inventors the exclusive Right to their respective Writings and Discoveries;</li>
							<li>To constitute Tribunals inferior to the supreme Court;</li>
							<li>To define and punish Piracies and Felonies committed on the high Seas, and Offenses against the Law of Nations;</li>
							<li>To declare War, grant Letters of Marque and Reprisal, and make Rules concerning Captures on Land and Water;</li>
							<li>To raise and support Armies, but no Appropriation of Money to that Use shall be for a longer Term than two Years;</li>
							<li>To provide and maintain a Navy;</li>
							<li>To make Rules for the Government and Regulation of the land and naval Forces;</li>
							<li>To provide for calling forth the Militia to execute the Laws of the Union, suppress Insurrections and repel Invasions;</li>
							<li>To provide for organizing, arming, and disciplining, the Militia, and for governing such Part of them as may be employed in the Service of the United States, reserving to the States respectively, the Appointment of the Officers, and the Authority of training the Militia according to the discipline prescribed by Congress;</li>
							<li>To exercise exclusive Legislation in all Cases whatsoever, over such District (not exceeding ten Miles square) as may, by Cession of particular States, and the Acceptance of Congress, become the Seat of the Government of the United States, and to exercise like Authority over all Places purchased by the Consent of the Legislature of the State in which the Same shall be, for the Erection of Forts, Magazines, Arsenals, dock-Yards and other needful Buildings;-And</li>
							<li>To make all Laws which shall be necessary and proper for carrying into Execution the foregoing Powers, and all other Powers vested by this Constitution in the Government of the United States, or in any Department or Officer thereof.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section defines various duties and responsibilities of Congress.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-i-section-9">
					<h4>Article I Section 9</h4>

					<blockquote>
						<ol>
							<li>The Migration or Importation of such Persons as any of the States now existing shall think proper to admit, shall not be prohibited by the Congress prior to the Year one thousand eight hundred and eight, but a Tax or duty may be imposed on such Importation, not exceeding ten dollars for each Person.</li>
							<li>The Privilege of the Writ of Habeas Corpus shall not be suspended, unless when in Cases of Rebellion or Invasion the public Safety may require it.</li>
							<li>No Bill of Attainder or ex post facto Law shall be passed.</li>
							<li>No Capitation, or other direct, Tax shall be laid, unless in Proportion to the Census or Enumeration herein before directed to be taken.</li>
							<li>No Tax or Duty shall be laid on Articles exported from any State.</li>
							<li>No Preference shall be given by any Regulation of Commerce or Revenue to the Ports of one State over those of another: nor shall Vessels bound to, or from, one State, be obliged to enter, clear, or pay Duties in another.</li>
							<li>No Money shall be drawn from the Treasury, but in Consequence of Appropriations made by Law; and a regular Statement and Account of the Receipts and Expenditures of all public Money shall be published from time to time.</li>
							<li>No Title of Nobility shall be granted by the United States: And no Person holding any Office of Profit or Trust under them, shall, without the Consent of the Congress, accept of any present, Emolument, Office, or Title, of any kind whatever, from any King, Prince, or foreign State.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section delineates the various restrictions placed upon Congress, particularly what type of bills may be passed.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-i-section-10">
					<h4>Article I Section 10</h4>

					<blockquote>
						<ol>
							<li>No State shall enter into any Treaty, Alliance, or Confederation; grant Letters of Marque and Reprisal; coin Money; emit Bills of Credit; make any Thing but gold and silver Coin a Tender in Payment of Debts; pass any Bill of Attainder, ex post facto Law, or Law impairing the Obligation of Contracts, or grant any Title of Nobility.</li>
							<li>No State shall, without the Consent of the Congress, lay any Imposts or Duties on Imports or Exports, except what may be absolutely necessary for executing it's inspection Laws: and the net Produce of all Duties and Imposts, laid by any State on Imports or Exports, shall be for the Use of the Treasury of the United States; and all such Laws shall be subject to the Revision and Controul of the Congress.</li>
							<li>No State shall, without the Consent of Congress, lay any Duty of Tonnage, keep Troops, or Ships of War in time of Peace, enter into any Agreement or Compact with another State, or with a foreign Power, or engage in War, unless actually invaded, or in such imminent Danger as will not admit of delay.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This shows the limitations upon states, and what they may not do without the consent of Congress.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-ii-section-1">
					<h4>Article II Section 1</h4>

					<blockquote>
						<ol>
							<li>The executive Power shall be vested in a President of the United States of America.</li>
							<li>He shall hold his Office during the Term of four Years, and, together with the Vice President, chosen for the same Term, be elected, as follows:</li>
							<li>Each State shall appoint, in such Manner as the Legislature thereof may direct, a Number of Electors, equal to the whole Number of Senators and Representatives to which the State may be entitled in the Congress: but no Senator or Representative, or Person holding an Office of Trust or Profit under the United States, shall be appointed an Elector.</li>
							<li>The Electors shall meet in their respective States, and vote by Ballot for two Persons, of whom one at least shall not be an Inhabitant of the same State with themselves. And they shall make a List of all the Persons voted for, and of the Number of Votes for each; which List they shall sign and certify, and transmit sealed to the Seat of the Government of the United States, directed to the President of the Senate. The President of the Senate shall, in the Presence of the Senate and House of Representatives, open all the Certificates, and the Votes shall then be counted. The Person having the greatest Number of Votes shall be the President, if such Number be a Majority of the whole Number of Electors appointed; and if there be more than one who have such Majority, and have an equal Number of Votes, then the House of Representatives shall immediately chuse by Ballot one of them for President; and if no Person have a Majority, then from the five highest on the List the said House shall in like Manner chuse the President. But in chusing the President, the Votes shall be taken by States, the Representation from each State having one Vote; A quorum for this Purpose shall consist of a Member or Members from two thirds of the States, and a Majority of all the States shall be necessary to a Choice. In every Case, after the Choice of the President, the Person having the greatest Number of Votes of the Electors shall be the Vice President. But if there should remain two or more who have equal Votes, the Senate shall chuse from them by Ballot the Vice President.</li>
							<li>The Congress may determine the Time of chusing the Electors, and the Day on which they shall give their Votes; which Day shall be the same throughout the United States.</li>
							<li>No Person except a natural born Citizen, or a Citizen of the United States, at the time of the Adoption of this Constitution, shall be eligible to the Office of President; neither shall any person be eligible to that Office who shall not have attained to the Age of thirty five Years, and been fourteen Years a Resident within the United States.</li>
							<li>In Case of the Removal of the President from Office, or of his Death, Resignation, or Inability to discharge the Powers and Duties of the said Office, the Same shall devolve on the Vice President, and the Congress may by Law provide for the Case of Removal, Death, Resignation or Inability, both of the President and Vice President, declaring what Officer shall then act as President, and such Officer shall act accordingly, until the Disability be removed, or a President shall be elected.</li>
							<li>The President shall, at stated Times, receive for his Services, a Compensation, which shall neither be increased nor diminished during the Period for which he shall have been elected, and he shall not receive within that Period any other Emolument from the United States, or any of them.</li>
							<li>Before he enter on the Execution of his Office, he shall take the following Oath or Affirmation:--"I do solemnly swear (or affirm) that I will faithfully execute the Office of President of the United States, and will to the best of my Ability, preserve, protect and defend the Constitution of the United States."</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section mainly discusses the electoral college process, and how the President and Vice President are chosen.  It also states that only a thirty-five-year-old natural-born citizen may become President.  Next, it discusses how the Vice President should step up if the President cannot perform their duties; finally, the Oath of Office is given.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-ii-section-2">
					<h4>Article II Section 2</h4>

					<blockquote>
						<ol>
							<li>The President shall be Commander in Chief of the Army and Navy of the United States, and of the Militia of the several States, when called into the actual Service of the United States; he may require the Opinion, in writing, of the principal Officer in each of the executive Departments, upon any Subject relating to the Duties of their respective Offices, and he shall have Power to grant Reprieves and Pardons for Offenses against the United States, except in Cases of Impeachment.</li>
							<li>He shall have Power, by and with the Advice and Consent of the Senate, to make Treaties, provided two thirds of the Senators present concur; and he shall nominate, and by and with the Advice and Consent of the Senate, shall appoint Ambassadors, other public Ministers and Consuls, Judges of the supreme Court, and all other Officers of the United States, whose Appointments are not herein otherwise provided for, and which shall be established by Law: but the Congress may by Law vest the Appointment of such inferior Officers, as they think proper, in the President alone, in the Courts of Law, or in the Heads of Departments.</li>
							<li>The President shall have Power to fill up all Vacancies that may happen during the Recess of the Senate, by granting Commissions which shall expire at the End of their next Session.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section states the President's duties within the military and Senate, particularly as Commander in Chief and to assist in the formation of treaties.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-ii-section-3">
					<h4>Article II Section 3</h4>

					<blockquote>
						He shall from time to time give to the Congress Information of the State of the Union, and recommend to their Consideration such Measures as he shall judge necessary and expedient; he may, on extraordinary Occasions, convene both Houses, or either of them, and in Case of Disagreement between them, with Respect to the Time of Adjournment, he may adjourn them to such Time as he shall think proper; he shall receive Ambassadors and other public Ministers; he shall take Care that the Laws be faithfully executed, and shall Commission all the Officers of the United States.
					</blockquote>

					<p class="flow-text">
						This dictates the Presidential responsibility to give a State of the Union address, and their ability to call the Congress into session.  Most notable, this section defines the purpose of the executive branch: "take care that the laws be faithfully executed."
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-ii-section-4">
					<h4>Article II Section 4</h4>

					<blockquote>
						The President, Vice President and all civil Officers of the United States, shall be removed from Office on Impeachment for, and Conviction of, Treason, Bribery, or other high Crimes and Misdemeanors.
					</blockquote>

					<p class="flow-text">
						This list of crimes dictates on what grounds the President may face impeachment.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-iii-section-1">
					<h4>Article III Section 1</h4>

					<blockquote>
						The judicial Power of the United States, shall be vested in one supreme Court, and in such inferior Courts as the Congress may from time to time ordain and establish. The Judges, both of the supreme and inferior Courts, shall hold their Offices during good Behaviour, and shall, at stated Times, receive for their Services, a Compensation, which shall not be diminished during their Continuance in Office.
					</blockquote>

					<p class="flow-text">
						This section dictates the federal Supreme Court, and expectations/payments for judges.  One notable thing is the lifelong term in office, which is to prevent political bias by judges.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-iii-section-2">
					<h4>Article III Section 2</h4>

					<blockquote>
						<ol>
							<li>The judicial Power shall extend to all Cases, in Law and Equity, arising under this Constitution, the Laws of the United States, and Treaties made, or which shall be made, under their Authority;--to all Cases affecting Ambassadors, other public Ministers and Consuls;--to all Cases of admiralty and maritime Jurisdiction;--to Controversies to which the United States shall be a Party;-- to Controversies between two or more States;--between a State and Citizens of another State;--between Citizens of different States;--between Citizens of the same State claiming Lands under Grants of different States, and between a State, or the Citizens thereof, and foreign States, Citizens or Subjects.</li>
							<li>In all Cases affecting Ambassadors, other public Ministers and Consuls, and those in which a State shall be Party, the supreme Court shall have original Jurisdiction. In all the other Cases before mentioned, the supreme Court shall have appellate Jurisdiction, both as to Law and Fact, with such Exceptions, and under such Regulations as the Congress shall make.</li>
							<li>The Trial of all Crimes, except in Cases of Impeachment; shall be by Jury; and such Trial shall be held in the State where the said Crimes shall have been committed; but when not committed within any State, the Trial shall be at such Place or Places as the Congress may by Law have directed.</li>
						</ol>
					</blockquote>

					<p class="flow-text no-bottom-margin">
						This lists which types and circumstances of cases may or may not be heard in the Supreme Court, limiting the power of this branch.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-iii-section-3">
					<h4>Article III Section 3</h4>

					<blockquote>
						<ol>
							<li>Treason against the United States, shall consist only in levying War against them, or in adhering to their Enemies, giving them Aid and Comfort. No Person shall be convicted of Treason unless on the Testimony of two Witnesses to the same overt Act, or on Confession in open Court.</li>
							<li>The Congress shall have Power to declare the Punishment of Treason, but no Attainder of Treason shall work Corruption of Blood, or Forfeiture except during the Life of the Person attainted.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section defines the important concept of treason, outlining who can deliver a verdict of treason and on what grounds.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-iv-section-1">
					<h4>Article IV Section 1</h4>

					<blockquote>
						Full Faith and Credit shall be given in each State to the public Acts, Records, and judicial Proceedings of every other State. And the Congress may by general Laws prescribe the Manner in which such Acts, Records and Proceedings shall be proved, and the Effect thereof.
					</blockquote>

					<p class="flow-text">
						This section declares the importance of a state's existing procedures, laws, and records, stating that Congress may only limit these in a general manner.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-iv-section-2">
					<h4>Article IV Section 2</h4>

					<blockquote>
						<ol>
							<li>The Citizens of each State shall be entitled to all Privileges and Immunities of Citizens in the several States.</li>
							<li>A Person charged in any State with Treason, Felony, or other Crime, who shall flee from Justice, and be found in another State, shall on Demand of the executive Authority of the State from which he fled, be delivered up, to be removed to the State having Jurisdiction of the Crime.</li>
							<li>No Person held to Service or Labour in one State, under the Laws thereof, escaping into another, shall, in Consequence of any Law or Regulation therein, be discharged from such Service or Labour, but shall be delivered up on Claim of the Party to whom such Service or Labour may be due.11</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section states that the benefits of citizenship and the iron fist of justice reach across state lines.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-iv-section-3">
					<h4>Article IV Section 3</h4>

					<blockquote>
						<ol>
							<li>New States may be admitted by the Congress into this Union; but no new State shall be formed or erected within the Jurisdiction of any other State; nor any State be formed by the Junction of two or more States, or Parts of States, without the Consent of the Legislatures of the States concerned as well as of the Congress.</li>
							<li>The Congress shall have Power to dispose of and make all needful Rules and Regulations respecting the Territory or other Property belonging to the United States; and nothing in this Constitution shall be so construed as to Prejudice any Claims of the United States, or of any particular State.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section limits how new states may be formed (with the approval of the Congress), and affirms Congress' rule over any territories or properties of the United States or states therein.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-iv-section-4">
					<h4>Article IV Section 4</h4>

					<blockquote>
						The United States shall guarantee to every State in this Union a Republican Form of Government, and shall protect each of them against Invasion; and on Application of the Legislature, or of the Executive (when the Legislature cannot be convened) against domestic Violence.
					</blockquote>

					<p class="flow-text">
						This guarantees a democratic republic within every state's government and states the federal government's responsibilities of protection against invasion and domestic violence.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-v">
					<h4>Article V</h4>

					<blockquote>
						The Congress, whenever two thirds of both Houses shall deem it necessary, shall propose Amendments to this Constitution, or, on the Application of the Legislatures of two thirds of the several States, shall call a Convention for proposing Amendments, which, in either Case, shall be valid to all Intents and Purposes, as Part of this Constitution, when ratified by the Legislatures of three fourths of the several States, or by Conventions in three fourths thereof, as the one or the other Mode of Ratification may be proposed by the Congress; Provided that no Amendment which may be made prior to the Year One thousand eight hundred and eight shall in any Manner affect the first and fourth Clauses in the Ninth Section of the first Article; and that no State, without its Consent, shall be deprived of its equal Suffrage in the Senate.
					</blockquote>

					<p class="flow-text">
						This article delineates the methods for amending the Constitution, allowing it to change with time.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-vi">
					<h4>Article VI</h4>

					<blockquote>
						<ol>
							<li>All Debts contracted and Engagements entered into, before the Adoption of this Constitution, shall be as valid against the United States under this Constitution, as under the Confederation.</li>
							<li>This Constitution, and the Laws of the United States which shall be made in Pursuance thereof; and all Treaties made, or which shall be made, under the Authority of the United States, shall be the supreme Law of the Land; and the Judges in every State shall be bound thereby, any Thing in the Constitution or Laws of any State to the Contrary notwithstanding.</li>
							<li>The Senators and Representatives before mentioned, and the Members of the several State Legislatures, and all executive and judicial Officers, both of the United States and of the several States, shall be bound by Oath or Affirmation, to support this Constitution; but no religious Test shall ever be required as a Qualification to any Office or public Trust under the United States</li>
						</ol>
					</blockquote>

					<p class="flow-text no-bottom-margin">
						This article affirms that:
					</p>
					<ul class="flow-text browser-default no-top-margin">
						<li>the government is still responsible for its previous debt,</li>
						<li>the Constitution and federal laws have supremacy over any state laws, and</li>
						<li>that certain public officials may be bound by oath to the Constitution, but not forced to undergo a religious test.</li>
					</ul>
				</div>
				<div class="divider"></div>
				<div class="section" id="article-vii">
					<h4>Article VII</h4>

					<blockquote>
						The Ratification of the Conventions of nine States, shall be sufficient for the Establishment of this Constitution between the States so ratifying the Same.
					</blockquote>

					<p class="flow-text">
						Nine states must ratify the Constitution in order to establish this constitution within those states.  Note that, per this article, the Constitution would not take effect in states which did not ratify the Constitution.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="resources">
					<h4>Resources</h4>

					<ul class="browser-default flow-text">
						<li><a href="https://constitutioncenter.org/interactive-constitution/preamble">Interactive Constitution, includes debates, essays, and analysis.</a></li>
						<li><a href="https://library.bridgew.edu/guides/constitution">U.S. Constitution: Teaching &amp; Learning Resources</a></li>
						<li><a href="http://constitutionus.com/images_intro.html">Images of the Constitution itself</a></li>
					</ul>
				</div>
			</div>
			<div class="col s12 m3 l2 hide-on-small-only">
<?= Values::createTOC([
	["preamble", "Preamble"],
	["article-i-section-1", "Article I Section 1"],
	["article-i-section-2", "Article I Section 2"],
	["article-i-section-3", "Article I Section 3"],
	["article-i-section-4", "Article I Section 4"],
	["article-i-section-5", "Article I Section 5"],
	["article-i-section-6", "Article I Section 6"],
	["article-i-section-7", "Article I Section 7"],
	["article-i-section-8", "Article I Section 8"],
	["article-i-section-9", "Article I Section 9"],
	["article-i-section-10", "Article I Section 10"],
	["article-ii-section-1", "Article II Section 1"],
	["article-ii-section-2", "Article II Section 2"],
	["article-ii-section-3", "Article II Section 3"],
	["article-ii-section-4", "Article II Section 4"],
	["article-iii-section-1", "Article III Section 1"],
	["article-iii-section-2", "Article III Section 2"],
	["article-iii-section-3", "Article III Section 3"],
	["article-iv-section-1", "Article IV Section 1"],
	["article-iv-section-2", "Article IV Section 2"],
	["article-iv-section-3", "Article IV Section 3"],
	["article-iv-section-4", "Article IV Section 4"],
	["article-v", "Article V"],
	["article-vi", "Article VI"],
	["article-vii", "Article VII"],
	["resources", "Resources"],
]) ?>
			</div>
		</div>
<?php
require_once Values::FOOTER_INC;
