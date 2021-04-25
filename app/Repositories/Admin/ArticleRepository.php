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
            ->orderBy('articles.title')
            //  ->toBase()
            ->paginate($perpage);
        return $articles;
    }

    public function getCountLeter($text){
        $count = iconv_strlen($text);
        return $count;
    }

    public function getCountWord($text){
        $count = str_word_count($text);
        return $count;
    }

    public function getCountSyllables($text){
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
        $index = 0.0588 * ($this->getCountLeter($text)/$this->getCountWord($text) * 100)
            - (0.296 * $this->getCountSentence($text)/$this->getCountWord($text) * 100)- 15.8;

        return $index;
    }

    public function getARI($text){
        $index = (4.71 * ($this->getCountLeter($text) / $this->getCountWord($text)))
            + ((0.5 * $this->getCountWord($text)/$this->getCountSentence($text))- 21.43);

        return $index;
    }

    public function getStatArticle($article_id){
        $articles = DB::select('select * from stat_articles where article_id = :article_id',['article_id'=>$article_id] );
        return $articles;
    }



}
