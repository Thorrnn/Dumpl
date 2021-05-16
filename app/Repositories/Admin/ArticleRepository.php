<?php


namespace App\Repositories\Admin;


use App\Models\Admin\Article as Model;
use App\Repositories\CoreRepository;
use Illuminate\Support\Facades\DB;

class ArticleRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }


    public function getAllArticles($perpage){
        $articles = $this->startConditions()
           // ->leftjoin('users', 'users.id','=','articles.author_id')
            ->select('articles.id','articles.title','articles.fieldsArticles','articles.status')
            ->orderBy('articles.id')
            //  ->toBase()
            ->paginate($perpage);
        return $articles;
    }
   public function delSpecialLetter($text){
       $text = trim($text, " \n\r\t\v\0" );
       $text = str_replace("&ndash;", "", $text);
       $text = str_replace("&nbsp;", "", $text);
       $text = str_replace("&mdash;", "", $text);
       $text = str_replace("&ndash", "", $text);
       $text = str_replace("&nbsp", "", $text);
       $text = str_replace("&mdash", "", $text);

       $text = str_replace("&laquo;", "", $text);
       $text = str_replace("&laquo", "", $text);
       $text = str_replace("&raquo;", "", $text);
       $text = str_replace("&raquo", "", $text);
       $text = str_replace("&#39;", "'", $text);

       $text = str_replace("\t", "", $text);
       $text = str_replace("\r", "", $text);
       $text = str_replace("\n", "", $text);

       $text = str_replace("\"\"\"", "", $text);
    /*   $text = str_replace("<p>", "", $text);
       $text = str_replace("</p>", "", $text);
       $text = str_replace("<s>", "", $text);
       $text = str_replace("<h/[1-7]>", "", $text);
       $text = str_replace("<h1>", "", $text);
       $text = str_replace("</h1>", "", $text);
       $text = str_replace("<h2>", "", $text);
       $text = str_replace("</h2>", "", $text);
       $text = str_replace("<h3>", "", $text);
       $text = str_replace("</h3>", "", $text);
       $text = str_replace("<h4>", "", $text);
       $text = str_replace("</h4>", "", $text);
       $text = str_replace("<h5>", "", $text);
       $text = str_replace("</h5>", "", $text);
       $text = str_replace("<h6>", "", $text);
       $text = str_replace("</h6>", "", $text);
       $text = str_replace("<em>", "", $text);
       $text = str_replace("</em>", "", $text);
       $text = str_replace("<strong>", "", $text);
       $text = str_replace("</strong>", "", $text);
       $text = str_replace("<ul>", "", $text);
       $text = str_replace("</ul>", "", $text);
       $text = str_replace("<li>", "", $text);
       $text = str_replace("</li>", "", $text);
       $text = str_replace("<ol>", "", $text);
       $text = str_replace("</ol>", "", $text);
       $text = str_replace("<blockquote>", "", $text);
       $text = str_replace("</blockquote>", "", $text);
       $text = str_replace("</small>", "", $text);
       $text = str_replace("<small>", "", $text);



       $text = str_replace("text-align:right", "", $text);
       $text = str_replace("text-align:center", "", $text);
       $text = str_replace("text-align:left", "", $text);
       $text = str_replace("text-align:justify", "", $text);
       $text = str_replace("span", "", $text);
       $text = str_replace("</span>", "", $text);

       $text = str_replace("color", "", $text);
       $text = str_replace("<span>", "", $text);
       $text = str_replace("</span>", "", $text);

       $text = str_replace("border=", "", $text);
       $text = str_replace("cellpadding=", "", $text);
       $text = str_replace("align=", "", $text);
       $text = str_replace("cellspacing=", "", $text);
       $text = str_replace("class=", "", $text);


       $text = str_replace("<td>", "", $text);
       $text = str_replace("</td>", "", $text);
       $text = str_replace("<tr>", "", $text);
       $text = str_replace("</tr>", "", $text);
       $text = str_replace("<tbody>", "", $text);
       $text = str_replace("</tbody>", "", $text);
    //   $text = str_replace("</h4>", "", $text);
    //   $text = str_replace("<h4>", "", $text);

       $text = str_replace("<table", "", $text);
       $text = str_replace("</table>", "", $text);
       $text = str_replace("style=", "", $text);

              $text = str_replace("<br>", "", $text);
       $text = str_replace("<br />", "", $text);


       $text = str_replace("<\t>", "", $text);
       $text = str_replace("<\r>", "", $text);
       $text = str_replace("<\n>", "", $text);
       $text = str_replace("table", "", $text);


*/

      $text = strip_tags($text);

       //dd($text);
       return $text;
   }



    public function getCountLeter($text){
        $text = $this->delSpecialLetter($text);
        $count = iconv_strlen($text);
        return $count;
    }

    public function getCountWord($text){
        $text = $this->delSpecialLetter($text);
        $count = count(preg_split('/\s+/u', $text, null, PREG_SPLIT_NO_EMPTY));
        return $count;
    }

    public function getCountSyllables($text){
        $text = $this->delSpecialLetter($text);
        #char patterns
        $RusA = "[абвгдеёжзийклмнопрстуфхцчшщъыьэюя]";
        $RusV = "[аеёиоуыэюя]";
        $RusN = "[бвгджзклмнпрстфхцчшщ]";
        $RusX = "[йъь]";

        #main ruller
        $regs[] = "~(". $RusX . ")(" . $RusA . $RusA . ")~iu";
        $regs[] = "~(". $RusV . ")(" . $RusV . $RusA  . ")~iu";
        $regs[] = "~(". $RusV . $RusN . ")(" . $RusN . $RusV . ")~iu";
        $regs[] = "~(". $RusN . $RusV . ")(" . $RusN . $RusV . ")~iu";
        $regs[] = "~(". $RusV . $RusN . ")(" . $RusN . $RusN. $RusV . ")~iu";
        $regs[] = "~(". $RusV . $RusN . $RusN . ")(". $RusN . $RusN . $RusV . ")~iu";
        $regs[] = "~(". $RusX . ")(" . $RusA . $RusA . ")~iu";
        $regs[] = "~(". $RusV . ")(" . $RusA . $RusV  . ")~iu";


        foreach($regs as $cur_regxp) {
            $count = preg_replace( $cur_regxp , "$1-$2" , $text);
        }
        return $count;
    }

    public function getCountSentence($text){
        $text = $this->delSpecialLetter($text);
        $count = 0;
        $array = explode ( '. ',$text);
        foreach($array as $arr) {
            $first = mb_substr ($arr, 0, 1, 'utf-8');
            if( mb_strtolower($first, 'utf-8') != $first ) {
                $count=$count+1;
            }
        }
        if ($count == 0) $count=1;
        return $count;
    }

    public function getColemanLiauIndex($text){
        $text = $this->delSpecialLetter($text);
        $index = 0.0588 * ($this->getCountLeter($text)/$this->getCountWord($text) * 100)
            - (0.296 * $this->getCountSentence($text)/$this->getCountWord($text) * 100) - 15.8;

        return $index;
    }

    public function getARI($text){
        $text = $this->delSpecialLetter($text);
        $index = (4.71 * ($this->getCountLeter($text) / $this->getCountWord($text)))
            + ((0.5 * $this->getCountWord($text)/$this->getCountSentence($text))- 21.43);

        return $index;
    }

    public function getStatArticle($article_id){

        $articles = DB::select('select * from stat_articles where article_id = :article_id',['article_id'=>$article_id] );
        return $articles;
    }



}
