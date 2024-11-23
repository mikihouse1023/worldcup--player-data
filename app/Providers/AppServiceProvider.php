<?php
/*同じ名前のことなるクラスがプロジェクト内で共存できるようになる。*/
namespace App\Providers;

/*コントローラーをインポート*/
use App\Http\Controllers\PlayersController;

/*Laravelの基本的なサービスプロバイダクラス
このクラスを拡張することで独自のサービスプロバイダを作成*/
use Illuminate\Support\ServiceProvider;

/*laravelのページネーション機能を提供するクラス
paginatorクラスの使用もといページネーション作成に必要*/
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * / Register any application services.
     */

    /*registerメソッドは、アプリケーションが起動する際にサービスコンテナに
    サービスをバインドするために使用。
    　*/
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


    public function boot(): void
    {
        /*ページネーションのビューをBootstrapスタイルに設定。
        Bootstrapは広く使われているフロントエンドフレームワークで、
        ページネーションのスタイルを統一することができる*/
        Paginator::useBootstrap();
    }
}
