                                            </td>
                                        </tr>
                                    </tbody></table></td>
                                            </tr></tbody>
                                            </table></td></tr></tbody></table>
                        <table width="660" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                        
                        
<div>   
            
            
<div style="width:800px; margin: auto;">            
                        

         <?php edit_post_link(); ?>
		<?php echo '<!-- ' . basename( get_page_template() ) . ' -->'; ?>

                                        <div class="single-email-footer"><font color="#666666" size="1" face="Arial, Helvetica, sans-serif">© 2015 Palm Beach Research Group. All rights reserved. Protected by copyright laws of the United States and international treaties. Any reproduction, copying, or redistribution, (electronic or otherwise) in whole or in part, is strictly prohibited without the express written permission of Palm Beach Research Group, 55 NE 5th Avenue Suite 100, Delray Beach, FL 33483. <br>
                                            <br>
                                            DISCLAIMER: This work is based on what we’ve learned as financial journalists. It may contain errors and you should not base investment decisions solely on what you read here. It’s your money and your responsibility. Nothing herein should be considered personalized investment advice. Although our employees may answer general customer service questions, they are not licensed to address your particular investment situation. Our track record is based on hypothetical results and may not reflect the same results as actual trades. Likewise, past performance is no guarantee of future returns. Palm Beach Research Group expressly forbids its editors fr m having a financial interest in their own securities recommendations to readers. Such recommendations may be traded, however, by other editors, Palm Beach Research Group LLC, its affiliated entities, employees, and agents, but only after waiting 24 hours after an internet broadcast or 72 hours after a publication only circulated through the mail.<br>
                                            <br>
                                            Palm Beach Research Group welcomes comments or suggestions <a href="http://palmbeachgroup.com/contact-us" target="_blank">here</a>. This address is for feedback only. For questions about your account, or to speak with customer service, call 888-501-2598 (U.S.) Monday-Friday, 9 a.m.-7 p.m. ET, or e-mail us <a href="http://palmbeachgroup.com/contact-us" target="_blank">here</a>. We look forward to your feedback and questions. However, the law prohibits us from giving individual and personal investment advice. We are unable to respond to e-mails and phone calls requesting that type of information.</font></div>

                                    

                    </td>
                </tr>
            </tbody>
        </table>
        <?php wp_footer(); ?>

<?php if ( in_category( array( 'special-reports', 'reports' ) )) { ?>


<script type="text/javascript">
$(document).ready(function(){

    $('<div class="page" id="disc"><div class="bottom"><div id="disclaimer">'+$(".single-email-footer").html()+'</div></div></div>').prependTo('body');

//    $('<div class="page"><div class="centered"><div id="doctitle">'+$("#updateTitle").html()+'</div></div></div>').prependTo('body');
	
	 $('<div class="page"><div class="centered" style="margin-top:-200px;"><div id="doctitle">'+$("#updateTitle").html()+'</div><div align="center" style=" font-style:italic; font-size:18px; margin-top:-150px; margin-bottom:150px;">'+$("#essayEditor").html()+'</div></div></div>').prependTo('body');

    $('<div class="page">&nbsp;</div>').appendTo('body');
    $('<div class="page"><div class="bottom"><div id="copyright">&copy;2015 Palm Beach Research Group<br />55 NE 5th Avenue Suite 100<br />Delray Beach, FL 33483</div></div></div>').appendTo('body');

    $(".txt_controls").prev().addClass("timestamp");


  $(".single-post img:not('.txt_controls img'),.single-post span:not('table[align=\"right\"] span'):not('#essayEditor'):not('.txt_controls span'),.single-post div:not('table[align=\"right\"] div'):not('.txt_controls'):not('.txt_controls div'):not('.txt_controls')").each(function(){

    if($(this).width()<250){

        $(this).addClass("cmFR");

    }

});





});
</script>

<style type="text/css">
#updateTitle{background:url("http://media.palmbeachgroup.com/images/pbrg-crest.png") -9999px -9999px no-repeat}
.page{overflow:hidden;height:0}

@media print{

.single-post a[href^='http']:after{content:attr(href);display:none}

    #updateTitle{margin:20px 0 5px;display:block}

    .timestamp,.txt_controls,#essayEditor,.single-email-footer,.post-edit-link,.header_tbl{display:none}

    html,body,.page{
        height:100%;padding:0;margin:0;overflow:visible
    }

    .page{
        page-break-after:always; 
        page-break-before:always; 
        width:100%;
        display:table;
        vertical-align:middle;
        position: relative;
    }

    .bottom{
        vertical-align:bottom;
        display:table-cell;
    }
    .centered{
        vertical-align:middle;
        display:table-cell;
    }
    .cmFR{
        float:right;
        margin:10px 0 10px 20px
    }
	
	 .bullet-image{
        float:left;
margin: 4px 0 0 0;
    }

    #doctitle{
        font-weight:700;
        width:85%;
        margin:auto;
        border-top:2px solid black;
        padding:20px 0 55px;
        margin-bottom:200px;
        font-size:34px;
        line-height:38px;
        text-align:center;
        position:relative
    }

    #doctitle::before{
        content:url('http://media.palmbeachgroup.com/images/pbrg-crest.png');
        position:absolute;
        bottom:0;
        margin-bottom:-380px;
        left:50%;
        margin-left:-45px;
        width:89px;
        height:105px
    }

   #doctitle::after{
        border-top:2px solid black;
        content:'';
        display:block;
        margin:auto;
        width:100%;
        left:0;
        right:0;
        font-weight:100;
        font-style:italic;
        padding:10px 0 0;
        font-size:18px;
        line-height:24px;
        text-align:center;
        bottom:0;
        position:absolute;
    }

    #disclaimer{
        border:1px solid #000;
        padding:20px;
        font:10px/12px arial,sans-serif;
        bottom:0;
        position:absolute;
    }
    #copyright{text-align:center;font:16px/18px georgia,serif}

    table,td,tr{
        background:none;
        border:0
    }

    table[bgcolor*="ccc"] table[bgcolor*="ccc"]{

        box-shadow:inset 0 0 0 1000px #eee;

        border:1px solid #ccc;

        padding:1px;

        page-break-inside:avoid

    }

    table[bgcolor*="FFE4E1"] table[bgcolor*="FFE4E1"]{

        box-shadow:inset 0 0 0 1000px #FFE4E1;

        padding:0;

        page-break-inside:avoid

    }

}

</style>



<?php }
?>
</div>


    </body>
</html>