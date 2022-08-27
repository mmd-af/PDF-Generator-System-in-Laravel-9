<?php

namespace App\Http\Controllers\Admin\Info;

use App\Http\Requests\Admin\Info\InfoStoreRequest;
use App\Http\Requests\Admin\Info\InfoUpdateRequest;
use App\Models\Info\Info;
use App\Repositories\Admin\InformationRepository;
use Illuminate\Routing\Controller as Controller;

class InfoController extends Controller
{
    protected $informationRepository;

    public function __construct(InformationRepository $informationRepository)
    {
        $this->informationRepository = $informationRepository;
    }

    public function index()
    {
        $contacts = $this->informationRepository->getContacts();
        return view('admin.info.index', compact('contacts'));
    }

    public function store(InfoStoreRequest $request)
    {
        $this->informationRepository->store($request);
        return redirect()->route('admin.information.index');
    }

    public function update(InfoUpdateRequest $request, Info $info)
    {
        $this->informationRepository->update($request, $info);
        return redirect()->route('admin.information.index');
    }

    public function createPDF($page)
    {
        return $this->informationRepository->createPDF($page);
    }

    public function destroy(Info $info)
    {
        $this->informationRepository->destroy($info);
        return redirect()->route('admin.information.index');
    }
}
