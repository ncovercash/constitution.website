<?php

define("ROOTDIR", "../../");
define("REAL_ROOTDIR", "../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", "learn");
define("PAGE_TITLE", Values::createTitle("Amendments | Learn", []));

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("Amendments");
?>
			<div class="row"><div class="col s12 m9 l10">
				<div class="section hide-on-med-and-up">
<?= Values::createInlineTOC([
	["amendment-i", "Amendment I"],
	["amendment-ii", "Amendment II"],
	["amendment-iii", "Amendment III"],
	["amendment-iv", "Amendment IV"],
	["amendment-v", "Amendment V"],
	["amendment-vi", "Amendment VI"],
	["amendment-vii", "Amendment VII"],
	["amendment-viii", "Amendment VIII"],
	["amendment-ix", "Amendment IX"],
	["amendment-x", "Amendment X"],
	["amendment-xi", "Amendment XI"],
	["amendment-xii", "Amendment XII"],
	["amendment-xiii", "Amendment XIII"],
	["amendment-xiv", "Amendment XIV"],
	["amendment-xv", "Amendment XV"],
	["amendment-xvi", "Amendment XVI"],
	["amendment-xvii", "Amendment XVII"],
	["amendment-xviii", "Amendment XVIII"],
	["amendment-xix", "Amendment XIX"],
	["amendment-xx", "Amendment XX"],
	["amendment-xxi", "Amendment XXI"],
	["amendment-xxii", "Amendment XXII"],
	["amendment-xxiii", "Amendment XXIII"],
	["amendment-xxiv", "Amendment XXIV"],
	["amendment-xxv", "Amendment XXV"],
	["amendment-xxvi", "Amendment XXVI"],
	["amendment-xxvii", "Amendment XXVII"],
	["resources", "Resources"],
]) ?>
				</div>
				<div class="divider hide-on-med-and-up"></div>
				<div class="section" id="amendment-i">
					<h4>Amendment I</h4>

					<blockquote>
						Congress shall make no law respecting an establishment of religion, or prohibiting the free exercise thereof; or abridging the freedom of speech, or of the press; or the right of the people peaceably to assemble, and to petition the Government for a redress of grievances.
					</blockquote>

					<p class="flow-text no-bottom-margin">This amendment prevents Congress (the branch of government which creates laws) from:</p>
					<ul class="browser-default no-top-margin flow-text">
						<li>Establishing an official religion,</li>
						<li>Prohibiting exercise of any particular religion,</li>
						<li>Disallowing free speech,</li>
						<li>Disallowing freedom of the press,</li>
						<li>Disallowing the right to assemble peacefully, and</li>
						<li>Disallowing the right to petition the government to fix issues.</li>
					</ul>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-ii">
					<h4>Amendment II</h4>

					<blockquote>
						A well regulated Militia, being necessary to the security of a free State, the right of the people to keep and bear Arms, shall not be infringed.
					</blockquote>

					<p class="flow-text">This amendment allows for an army to be kept and maintained in order to ensure America's freedom, as well as for citizens to be able to own and use weapons.</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-iii">
					<h4>Amendment III</h4>

					<blockquote>
						No Soldier shall, in time of peace be quartered in any house, without the consent of the Owner, nor in time of war, but in a manner to be prescribed by law.
					</blockquote>

					<p class="flow-text">
						This amendment, although not modernly relevant, forbids homeowners from being forced into housing troops.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-iv">
					<h4>Amendment IV</h4>

					<blockquote>
						The right of the people to be secure in their persons, houses, papers, and effects, against unreasonable searches and seizures, shall not be violated, and no Warrants shall issue, but upon probable cause, supported by Oath or affirmation, and particularly describing the place to be searched, and the persons or things to be seized.
					</blockquote>

					<p class="flow-text">
						This amendment requires a specific warrant (issued upon probable cause) in order for police to search or seize people and their property.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-v">
					<h4>Amendment V</h4>

					<blockquote>
						No person shall be held to answer for a capital, or otherwise infamous crime, unless on a presentment or indictment of a Grand Jury, except in cases arising in the land or naval forces, or in the Militia, when in actual service in time of War or public danger; nor shall any person be subject for the same offence to be twice put in jeopardy of life or limb; nor shall be compelled in any criminal case to be a witness against himself, nor be deprived of life, liberty, or property, without due process of law; nor shall private property be taken for public use, without just compensation.
					</blockquote>

					<p class="flow-text no-bottom-margin">
						This amendment states that:
					</p>
					<ul class="browser-default no-top-margin flow-text">
						<li>No person should face trial federally without a Grand Jury (a panel which decides if charges should be filed),</li>
						<li>No person be tried twice for the same crime without new evidence,</li>
						<li>No person should be forced to confess,</li>
						<li>No person should be deprived of their assets or liberties without a proper trial, and</li>
						<li>The government may seize private property, but the owners must be paid fairly for it (also known as eminent domain).</li>
					</ul>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-vi">
					<h4>Amendment VI</h4>

					<blockquote>
						In all criminal prosecutions, the accused shall enjoy the right to a speedy and public trial, by an impartial jury of the State and district wherein the crime shall have been committed, which district shall have been previously ascertained by law, and to be informed of the nature and cause of the accusation; to be confronted with the witnesses against him; to have compulsory process for obtaining witnesses in his favor, and to have the Assistance of Counsel for his defence.
					</blockquote>

					<p class="flow-text no-bottom-margin">
						This amendment ensures that the accused will be given a fair trial, as dictated by the following guidelines:
					</p>
					<ul class="flow-text browser-default no-top-margin">
						<li>The accused will be given a trial soon after the crime, so they do not face prolonged imprisonment while awaiting their trial,</li>
						<li>The trial shall be public, to ensure credibility,</li>
						<li>The trial should be held in the same area where the crime was committed,</li>
						<li>The trial will have an impartial (fair and unbiased) jury who is from the same region (so they are familiar with local law),</li>
						<li>The accused will be informed of what crime(s) they are alleged to have committed, and on what grounds (evidence),</li>
						<li>The accused will have the opportunity to find witnesses to defend them, and</li>
						<li>The accused will have the assistance of a lawyer.</li>
					</ul>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-vii">
					<h4>Amendment VII</h4>

					<blockquote>
						In Suits at common law, where the value in controversy shall exceed twenty dollars, the right of trial by jury shall be preserved, and no fact tried by a jury, shall be otherwise reexamined in any Court of the United States, than according to the rules of the common law.
					</blockquote>

					<p class="flow-text">
						This amendment, although less relevant in the modern day, ensures that the right to a jury will always be available in large ($20+) civil (non-criminal, e.g., divorces, child support, contract violations) federal cases.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-viii">
					<h4>Amendment VIII</h4>

					<blockquote>
						Excessive bail shall not be required, nor excessive fines imposed, nor cruel and unusual punishments inflicted.
					</blockquote>

					<p class="flow-text no-bottom-margin">
						This amendment ensures that those who are convicted will not be forced to pay absurd amounts or face immoral punishments.  This prevents a lot of potential for wrongdoing in the declaration of a sentence, such as:
					</p>
					<ul class="flow-text browser-default no-top-margin">
						<li>Requiring a million dollars of bail for a parking violation,</li>
						<li>Torturing a prisoner, and</li>
						<li>Charging a fine of several million dollars for a speeding ticket.</li>
					</ul>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-ix">
					<h4>Amendment IX</h4>

					<blockquote>
						The enumeration in the Constitution, of certain rights, shall not be construed to deny or disparage others retained by the people.
					</blockquote>

					<p class="flow-text">
						Essentially, this amendment states that other rights may not have been listed, but that they must still be protected.  For example, although a "Freedom of Learning" may not be in the Bill of Rights, the government cannot impose a law to restrict this freedom.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-x">
					<h4>Amendment X</h4>

					<blockquote>
						The powers not delegated to the United States by the Constitution, nor prohibited by it to the States, are reserved to the States respectively, or to the people.
					</blockquote>

					<p class="flow-text">
						Any roles or responsibilities not given to the federal government, or disallowed from being given to the states, will be given to the states or their people.  For example, the role of education is not part of the constitution nor given to the federal government, so each state leads its own Department of Education.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xi">
					<h4>Amendment XI</h4>

					<blockquote>
						The Judicial power of the United States shall not be construed to extend to any suit in law or equity, commenced or prosecuted against one of the United States by Citizens of another State, or by Citizens or Subjects of any Foreign State.
					</blockquote>

					<p class="flow-text">
						This prevents individuals from suing another state at the federal level.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xii">
					<h4>Amendment XII</h4>

					<blockquote>
						The Electors shall meet in their respective states and vote by ballot for President and Vice-President, one of whom, at least, shall not be an inhabitant of the same state with themselves; they shall name in their ballots the person voted for as President, and in distinct ballots the person voted for as Vice-President, and they shall make distinct lists of all persons voted for as President, and of all persons voted for as Vice-President, and of the number of votes for each, which lists they shall sign and certify, and transmit sealed to the seat of the government of the United States, directed to the President of the Senate; -- The President of the Senate shall, in the presence of the Senate and House of Representatives, open all the certificates and the votes shall then be counted; -- The person having the greatest number of votes for President, shall be the President, if such number be a majority of the whole number of Electors appointed; and if no person have such majority, then from the persons having the highest numbers not exceeding three on the list of those voted for as President, the House of Representatives shall choose immediately, by ballot, the President. But in choosing the President, the votes shall be taken by states, the representation from each state having one vote; a quorum for this purpose shall consist of a member or members from two-thirds of the states, and a majority of all the states shall be necessary to a choice. And if the House of Representatives shall not choose a President whenever the right of choice shall devolve upon them, before the fourth day of March next following, then the Vice-President shall act as President, as in case of the death or other constitutional disability of the President. -- The person having the greatest number of votes as Vice-President, shall be the Vice-President, if such number be a majority of the whole number of Electors appointed, and if no person have a majority, then from the two highest numbers on the list, the Senate shall choose the Vice-President; a quorum for the purpose shall consist of two-thirds of the whole number of Senators, and a majority of the whole number shall be necessary to a choice. But no person constitutionally ineligible to the office of President shall be eligible to that of Vice-President of the United States.
					</blockquote>

					<p class="flow-text">
						This amendment discusses the new process of election for President and Vice Presidents.  Previously, the second place candidate for President became the Vice President, often forcing opponents into the same office.  Under this amendment, President and Vice President are voted for separately (although the Vice President must be able to perform as President if the elected President is unable).
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xiii">
					<h4>Amendment XIII</h4>

					<blockquote>
						<ol>
							<li>Neither slavery nor involuntary servitude, except as a punishment for crime whereof the party shall have been duly convicted, shall exist within the United States, or any place subject to their jurisdiction.</li>
							<li>Congress shall have power to enforce this article by appropriate legislation.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This amendment abolishes slavery, giving Congress the ability to enforce these emancipations.  Lincoln's Emancipation Proclamation had only freed slaves in the Southern states, so this amendment was needed to fully abolish the practice across America.  This is important as this is one of the "Reconstruction Amendments," and was ratified by the Northern states during the Civil War.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xiv">
					<h4>Amendment XIV</h4>

					<blockquote>
						<ol>
							<li>All persons born or naturalized in the United States, and subject to the jurisdiction thereof, are citizens of the United States and of the State wherein they reside. No State shall make or enforce any law which shall abridge the privileges or immunities of citizens of the United States; nor shall any State deprive any person of life, liberty, or property, without due process of law; nor deny to any person within its jurisdiction the equal protection of the laws.</li>
							<li>Representatives shall be apportioned among the several States according to their respective numbers, counting the whole number of persons in each State, excluding Indians not taxed. But when the right to vote at any election for the choice of electors for President and Vice-President of the United States, Representatives in Congress, the Executive and Judicial officers of a State, or the members of the Legislature thereof, is denied to any of the male inhabitants of such State, being twenty-one years of age, and citizens of the United States, or in any way abridged, except for participation in rebellion, or other crime, the basis of representation therein shall be reduced in the proportion which the number of such male citizens shall bear to the whole number of male citizens twenty-one years of age in such State.</li>
							<li>No person shall be a Senator or Representative in Congress, or elector of President and Vice-President, or hold any office, civil or military, under the United States, or under any State, who, having previously taken an oath, as a member of Congress, or as an officer of the United States, or as a member of any State legislature, or as an executive or judicial officer of any State, to support the Constitution of the United States, shall have engaged in insurrection or rebellion against the same, or given aid or comfort to the enemies thereof. But Congress may by a vote of two-thirds of each House, remove such disability.</li>
							<li>The validity of the public debt of the United States, authorized by law, including debts incurred for payment of pensions and bounties for services in suppressing insurrection or rebellion, shall not be questioned. But neither the United States nor any State shall assume or pay any debt or obligation incurred in aid of insurrection or rebellion against the United States, or any claim for the loss or emancipation of any slave; but all such debts, obligations and claims shall be held illegal and void.</li>
							<li>The Congress shall have the power to enforce, by appropriate legislation, the provisions of this article.</li>
						</ol>
					</blockquote>

					<p class="flow-text no-bottom-margin">
						This amendment performs several functions and definitions:
					</p>
					<ul class="flow-text browser-default no-top-margin">
						<li>Provides a clear definition of a citizen,</li>
						<li>Explicitly states that the privileges and rights of citizens may not be suppressed without the due process of law,</li>
						<li>States that the law applies equally to all citizens,</li>
						<li>Defines how the number of electors should be calculated,</li>
						<li>Forbids treasonous people (who have rebelled against the Constitution, or helped enemies of it) from holding office, unless Congress specifically allows them, and</li>
						<li>Denies any costs or debts resulting from freeing slaves or in suppressing rebellion (significant after the Civil War).</li>
					</ul>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xv">
					<h4>Amendment XV</h4>

					<blockquote>
						<ol>
							<li>The right of citizens of the United States to vote shall not be denied or abridged by the United States or by any State on account of race, color, or previous condition of servitude.</li>
							<li>The Congress shall have the power to enforce this article by appropriate legislation.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This amendment explicitly states that citizens may vote regardless of race, color, or history of slavery.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xvi">
					<h4>Amendment XVI</h4>

					<blockquote>
						The Congress shall have power to lay and collect taxes on incomes, from whatever source derived, without apportionment among the several States, and without regard to any census or enumeration.
					</blockquote>

					<p class="flow-text">
						This amendment allows the collection of income tax for any cause and reason.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xvii">
					<h4>Amendment XVII</h4>

					<blockquote>
						<p>The Senate of the United States shall be composed of two Senators from each State, elected by the people thereof, for six years; and each Senator shall have one vote. The electors in each State shall have the qualifications requisite for electors of the most numerous branch of the State legislatures.</p>
						<p>When vacancies happen in the representation of any State in the Senate, the executive authority of such State shall issue writs of election to fill such vacancies: Provided, That the legislature of any State may empower the executive thereof to make temporary appointments until the people fill the vacancies by election as the legislature may direct.</p>
						<p>This amendment shall not be so construed as to affect the election or term of any Senator chosen before it becomes valid as part of the Constitution.</p>
					</blockquote>

					<p class="flow-text">
						This amendment states that Senators are to be elected by the general public every six years (although state legislatures may make temporary appointments until an election is held).
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xviii">
					<h4>Amendment XVIII</h4>

					<blockquote>
						<ol>
							<li>After one year from the ratification of this article the manufacture, sale, or transportation of intoxicating liquors within, the importation thereof into, or the exportation thereof from the United States and all territory subject to the jurisdiction thereof for beverage purposes is hereby prohibited.</li>
							<li>The Congress and the several States shall have concurrent power to enforce this article by appropriate legislation.</li>
							<li>This article shall be inoperative unless it shall have been ratified as an amendment to the Constitution by the legislatures of the several States, as provided in the Constitution, within seven years from the date of the submission hereof to the States by the Congress.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This amendment prohibited the sale, manufacturing, and transportation of alcohol.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xix">
					<h4>Amendment XIX</h4>

					<blockquote>
						<p>The right of citizens of the United States to vote shall not be denied or abridged by the United States or by any State on account of sex.</p>
						<p>Congress shall have power to enforce this article by appropriate legislation.</p>
					</blockquote>

					<p class="flow-text">
						This amendment allowed all genders (women) to vote.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xx">
					<h4>Amendment XX</h4>

					<blockquote>
						<ol>
							<li>The terms of the President and the Vice President shall end at noon on the 20th day of January, and the terms of Senators and Representatives at noon on the 3d day of January, of the years in which such terms would have ended if this article had not been ratified; and the terms of their successors shall then begin.</li>
							<li>The Congress shall assemble at least once in every year, and such meeting shall begin at noon on the 3d day of January, unless they shall by law appoint a different day.</li>
							<li>If, at the time fixed for the beginning of the term of the President, the President elect shall have died, the Vice President elect shall become President. If a President shall not have been chosen before the time fixed for the beginning of his term, or if the President elect shall have failed to qualify, then the Vice President elect shall act as President until a President shall have qualified; and the Congress may by law provide for the case wherein neither a President elect nor a Vice President shall have qualified, declaring who shall then act as President, or the manner in which one who is to act shall be selected, and such person shall act accordingly until a President or Vice President shall have qualified.</li>
							<li>The Congress may by law provide for the case of the death of any of the persons from whom the House of Representatives may choose a President whenever the right of choice shall have devolved upon them, and for the case of the death of any of the persons from whom the Senate may choose a Vice President whenever the right of choice shall have devolved upon them.</li>
							<li>Sections 1 and 2 shall take effect on the 15th day of October following the ratification of this article.</li>
							<li>This article shall be inoperative unless it shall have been ratified as an amendment to the Constitution by the legislatures of three-fourths of the several States within seven years from the date of its submission.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This section states the dates on which terms and congressional sessions begin and end, as well as the procedures to follow in the event a President is unable to serve their office (the Vice President takes office, then the Speaker of the House).
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xxi">
					<h4>Amendment XXI</h4>

					<blockquote>
						<ol>
							<li>The eighteenth article of amendment to the Constitution of the United States is hereby repealed.</li>
							<li>The transportation or importation into any State, Territory, or Possession of the United States for delivery or use therein of intoxicating liquors, in violation of the laws thereof, is hereby prohibited.</li>
							<li>This article shall be inoperative unless it shall have been ratified as an amendment to the Constitution by conventions in the several States, as provided in the Constitution, within seven years from the date of the submission hereof to the States by the Congress.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This amendment repeals the <a href="amendment-xviii">eighteenth amendment</a>, allowing liquor everywhere except where it has been prohibited on a state-wide level.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xxii">
					<h4>Amendment XXII</h4>

					<blockquote>
						<ol>
							<li>No person shall be elected to the office of the President more than twice, and no person who has held the office of President, or acted as President, for more than two years of a term to which some other person was elected President shall be elected to the office of President more than once. But this Article shall not apply to any person holding the office of President when this Article was proposed by Congress, and shall not prevent any person who may be holding the office of President, or acting as President, during the term within which this Article becomes operative from holding the office of President or acting as President during the remainder of such term.</li>
							<li>This article shall be inoperative unless it shall have been ratified as an amendment to the Constitution by the legislatures of three-fourths of the several States within seven years from the date of its submission to the States by the Congress.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This amendment limits the President to two terms (eight years) in office.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xxiii">
					<h4>Amendment XXIII</h4>

					<blockquote>
						<ol>
							<li>
								The District constituting the seat of Government of the United States shall appoint in such manner as Congress may direct:
								<br>
								A number of electors of President and Vice President equal to the whole number of Senators and Representatives in Congress to which the District would be entitled if it were a State, but in no event more than the least populous State; they shall be in addition to those appointed by the States, but they shall be considered, for the purposes of the election of President and Vice President, to be electors appointed by a State; and they shall meet in the District and perform such duties as provided by the twelfth article of amendment.
							</li>
							<li>The Congress shall have power to enforce this article by appropriate legislation.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This amendment allows Washington DC to cast electoral votes in the electoral college.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xxiv">
					<h4>Amendment XXIV</h4>

					<blockquote>
						<ol>
							<li>The right of citizens of the United States to vote in any primary or other election for President or Vice President, for electors for President or Vice President, or for Senator or Representative in Congress, shall not be denied or abridged by the United States or any State by reason of failure to pay poll tax or other tax.</li>
							<li>The Congress shall have power to enforce this article by appropriate legislation.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This amendment encouraged voting by disallowing poll taxes (fees charged in order to vote).
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xxv">
					<h4>Amendment XXV</h4>

					<blockquote>
						<ol>
							<li>In case of the removal of the President from office or of his death or resignation, the Vice President shall become President.</li>
							<li>Whenever there is a vacancy in the office of the Vice President, the President shall nominate a Vice President who shall take office upon confirmation by a majority vote of both Houses of Congress.</li>
							<li>Whenever the President transmits to the President pro tempore of the Senate and the Speaker of the House of Representatives his written declaration that he is unable to discharge the powers and duties of his office, and until he transmits to them a written declaration to the contrary, such powers and duties shall be discharged by the Vice President as Acting President.</li>
							<li>
								Whenever the Vice President and a majority of either the principal officers of the executive departments or of such other body as Congress may by law provide, transmit to the President pro tempore of the Senate and the Speaker of the House of Representatives their written declaration that the President is unable to discharge the powers and duties of his office, the Vice President shall immediately assume the powers and duties of the office as Acting President.
								<br>
								Thereafter, when the President transmits to the President pro tempore of the Senate and the Speaker of the House of Representatives his written declaration that no inability exists, he shall resume the powers and duties of his office unless the Vice President and a majority of either the principal officers of the executive department or of such other body as Congress may by law provide, transmit within four days to the President pro tempore of the Senate and the Speaker of the House of Representatives their written declaration that the President is unable to discharge the powers and duties of his office. Thereupon Congress shall decide the issue, assembling within forty-eight hours for that purpose if not in session. If the Congress, within twenty-one days after receipt of the latter written declaration, or, if Congress is not in session, within twenty-one days after Congress is required to assemble, determines by two-thirds vote of both Houses that the President is unable to discharge the powers and duties of his office, the Vice President shall continue to discharge the same as Acting President; otherwise, the President shall resume the powers and duties of his office.
							</li>
						</ol>
					</blockquote>

					<p class="flow-text no-bottom-margin">
						This amendment defined specific procedures for presidential succession:
					</p>
					<ul class="flow-text browser-default no-top-margin">
						<li>If the President's office is vacant, the Vice President will take it</li>
						<li>If the Vice President's office is vacant, the President will nominate a new Vice President who must be confirmed by Congress.</li>
						<li>If the President declares that they are unable to hold office, the Vice President will act as President until the President can return</li>
						<li>If the Vice President and other executive officers decide the President is unfit for office, the Vice President will act as President until the President states that they can return to office.  This can be overridden, in which case Congress must assemble to determine which party to believe.</li>
					</ul>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xxvi">
					<h4>Amendment XXVI</h4>

					<blockquote>
						<ol>
							<li>The right of citizens of the United States, who are eighteen years of age or older, to vote shall not be denied or abridged by the United States or by any State on account of age.</li>
							<li>The Congress shall have power to enforce this article by appropriate legislation.</li>
						</ol>
					</blockquote>

					<p class="flow-text">
						This amendment lowers the voting age to 18.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="amendment-xxvii">
					<h4>Amendment XXVII</h4>

					<blockquote>
						No law, varying the compensation for the services of the Senators and Representatives, shall take effect, until an election of representatives shall have intervened.
					</blockquote>

					<p class="flow-text">
						This makes it so that members of Congress can not increase their current salary.
					</p>
				</div>
				<div class="divider"></div>
				<div class="section" id="resources">
					<h4>Resources</h4>

					<ul class="browser-default flow-text">
						<li><a href="https://constitutioncenter.org/interactive-constitution/amendments/amendment-i">Interactive Constitution, includes debates, essays, and analysis.</a></li>
						<li><a href="https://www.icivics.org/games/do-i-have-right">"Do I Have a Right?" game, where the player acts as a lawyer who determines if their client's rights were infringed and, if so, which amendment was violated. This game supports all twenty-seven amendments, or just the Bill of Rights, depending on the player's preferences.</a></li>
					</ul>
				</div>
			</div>
			<div class="col s12 m3 l2 hide-on-small-only">
<?= Values::createTOC([
	["amendment-i", "Amendment I"],
	["amendment-ii", "Amendment II"],
	["amendment-iii", "Amendment III"],
	["amendment-iv", "Amendment IV"],
	["amendment-v", "Amendment V"],
	["amendment-vi", "Amendment VI"],
	["amendment-vii", "Amendment VII"],
	["amendment-viii", "Amendment VIII"],
	["amendment-ix", "Amendment IX"],
	["amendment-x", "Amendment X"],
	["amendment-xi", "Amendment XI"],
	["amendment-xii", "Amendment XII"],
	["amendment-xiii", "Amendment XIII"],
	["amendment-xiv", "Amendment XIV"],
	["amendment-xv", "Amendment XV"],
	["amendment-xvi", "Amendment XVI"],
	["amendment-xvii", "Amendment XVII"],
	["amendment-xviii", "Amendment XVIII"],
	["amendment-xix", "Amendment XIX"],
	["amendment-xx", "Amendment XX"],
	["amendment-xxi", "Amendment XXI"],
	["amendment-xxii", "Amendment XXII"],
	["amendment-xxiii", "Amendment XXIII"],
	["amendment-xxiv", "Amendment XXIV"],
	["amendment-xxv", "Amendment XXV"],
	["amendment-xxvi", "Amendment XXVI"],
	["amendment-xxvii", "Amendment XXVII"],
	["resources", "Resources"],
]) ?>
			</div>
		</div>
<?php
require_once Values::FOOTER_INC;
