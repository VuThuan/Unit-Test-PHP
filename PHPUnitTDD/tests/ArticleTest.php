<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    public function setUp(): void
    {
        $this->article = new App\Article;
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(), "");
    }
    /*
    public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = "An example article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugHasWhitespaceReplaceBySingleUnderscores()
    {
        $this->article->title = "An       example        \n    article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotStartOrEndWithAnUnderscore()
    {
        $this->article->title = " An example article ";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotHaveAnyNonWordCharacters()
    {
        $this->article->title = "Read! This$ Now@";

        $this->assertEquals($this->article->getSlug(), "Read_This_Now");
    }
    Đoạn code trên lặp lại nhiều lần nên ta sẽ sử dụng cách khác để tối giản code
    */

    public function titleProvider()
    {
        return [
            'SLug Has Spaces Replaced By Underscore'
            => ["An example article", "An_example_article"],
            'SLug Has Whitespace Replaced By Single Underscore'
            => ["An       example       \n   article", "An_example_article"],
            'Slug Does Not Start Or End With An Underscore'
            => [" An example article ", "An_example_article"],
            'Slog Does Not Have Any Non Word Characters'
            => ["Read! This$ Now@", "Read_This_Now"]
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    //@dataProvider xác định dữ liệu sẽ truyền vào hàm testSlug, Sau khi truyền nó sẽ foreach lấy từng data một
    {
        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug(), $slug);
    }
}
