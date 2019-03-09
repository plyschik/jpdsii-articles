<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Article;
use App\Category;
use Amenadiel\JpGraph\Graph\Graph;
use Amenadiel\JpGraph\Plot\BarPlot;
use Amenadiel\JpGraph\Plot\PiePlot;
use App\Http\Controllers\Controller;
use Amenadiel\JpGraph\Plot\LinePlot;
use Illuminate\Support\Facades\File;
use Amenadiel\JpGraph\Graph\PieGraph;
use Amenadiel\JpGraph\Themes\UniversalTheme;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

class StatsController extends Controller
{
    public function live()
    {
        return view('dashboard.stats.live');
    }

    public function report()
    {
        $this->articlesChart();
        $this->categoriesChart();
        $this->usersChart();

        /** @var \niklasravnsborg\LaravelPdf\Pdf $pdf */
        $pdf = PDF::loadView('pdf.report', [
            'articlesCount' => Article::count(),
            'categoriesCount' => Category::count(),
            'usersCount' => User::count()
        ]);

        return $pdf->stream('report.pdf');
    }

    private function articlesChart()
    {
        File::delete(public_path('images/charts/articles.png'));

        $data = Article::selectRaw('MONTH(created_at) month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $graph = new Graph(800, 250);
        $graph->SetScale("textlin");
        $graph->SetBox(false);

        $graph->title->Set("Liczba nowych artykułów z podziałem na miesiące");
        $graph->ygrid->SetFill(false);
        $graph->xaxis->SetTickLabels(['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień']);
        $graph->yaxis->HideLine(false);

        $b1plot = new BarPlot($data->pluck('count')->toArray());
        $b1plot->SetColor("white");
        $b1plot->SetFillGradient("#00F", "white", GRAD_LEFT_REFLECTION);
        $graph->Add($b1plot);

        $graph->Stroke(public_path('images/charts/articles.png'));
    }

    private function categoriesChart()
    {
        File::delete(public_path('images/charts/categories.png'));

        $categories = Category::withCount('articles')->get();

        $graph = new PieGraph(800,250);
        $graph->title->Set("Kategorie według liczby artykułów");
        $graph->SetBox(true);
        $graph->SetAntiAliasing(true);

        $p1 = new PiePlot($categories->pluck('articles_count')->toArray());
        $graph->Add($p1);

        $p1->ShowBorder();
        $p1->SetColor('black');
        $p1->SetSliceColors(['#F00', '#0F0', '#00F', '#FF0', '#000']);
        $p1->setLegends($categories->pluck('name')->toArray());

        $graph->Stroke(public_path('images/charts/categories.png'));
    }

    private function usersChart()
    {
        File::delete(public_path('images/charts/users.png'));

        $users = User::limit(3);
        $users->each(function ($user) use (&$data) {
            $visits = [];
            foreach(range(1, 12) as $month) {
                $visits[] = mt_rand(0, 20);
            }

            $data[] = [
                'name' => $user->full_name,
                'visits' => $visits
            ];
        });

        $graph = new Graph(800,250);
        $graph->SetScale("textlin");
        $graph->SetTheme(new UniversalTheme);
        $graph->img->SetAntiAliasing(true);
        $graph->SetBox(false);
        $graph->title->Set('Liczba wizyt użytkowników w danym miesiącu');
        $graph->img->SetAntiAliasing();

        $graph->yaxis->HideLine(false);

        $graph->xgrid->Show();
        $graph->xgrid->SetLineStyle("solid");
        $graph->xaxis->SetTickLabels(['Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru']);
        $graph->xgrid->SetColor('#E3E3E3');

        $p1 = new LinePlot($data[0]['visits']);
        $graph->Add($p1);
        $p1->SetColor("#F00");
        $p1->SetLegend($data[0]['name']);

        $p2 = new LinePlot($data[1]['visits']);
        $graph->Add($p2);
        $p2->SetColor("#0F0");
        $p2->SetLegend($data[1]['name']);

        $p3 = new LinePlot($data[2]['visits']);
        $graph->Add($p3);
        $p3->SetColor("#00F");
        $p3->SetLegend($data[2]['name']);

        $graph->legend->SetFrameWeight(1);

        $graph->Stroke(public_path('images/charts/users.png'));
    }
}