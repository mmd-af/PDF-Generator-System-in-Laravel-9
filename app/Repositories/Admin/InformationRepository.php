<?php

namespace App\Repositories\Admin;

use App\Models\Info\Info;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Pagination\Paginator;

class InformationRepository extends BaseRepository
{
    public function __construct(Info $model)
    {
        $this->setModel($model);
    }

    public function getContacts()
    {
        return Info::query()
            ->select([
                'id',
                'first_name',
                'last_name',
                'tel'
            ])
            ->orderBy('id', 'DESC')
            ->paginate(11);
    }

    public function store($request)
    {
        $item = new Info();
        $item->first_name = $request->input('first_name');
        $item->last_name = $request->input('last_name');
        $item->tel = $request->input('tel');
        $item->save();
    }

    public function update($request, $info)
    {
        $info->first_name = $request->input('first_name');
        $info->last_name = $request->input('last_name');
        $info->tel = $request->input('tel');
        $info->save();
    }

    public function createPDF($page)
    {
        Paginator::currentPageResolver(fn() => $page);
        $contacts = $this->getContacts();
        $pdf = PDF::loadView('admin.info.pdf_export', compact('contacts'));
        return $pdf->setPaper('a4')->download("contacts-page(" . $contacts->currentPage() . ").pdf");
    }

    public function destroy($info)
    {
        $info->delete();
    }
}
