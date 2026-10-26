<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDetail;
use Illuminate\Http\Request;

class CompanyDetailController extends Controller
{

    public function show()
    {
        $company = CompanyDetail::first();
        return view('company.show', compact('company'));
    }


    public function edit()
    {
        $company = CompanyDetail::first();
        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string',
            'emails' => 'nullable|array',
            'phones' => 'nullable|array',
            'whatsapp' => 'nullable|string',
            'address' => 'nullable|string',
            'google_map_link' => 'nullable|string',
            'social_links' => 'nullable|array',
        ]);

        if (!empty($data['social_links'])) {
            $data['social_links'] = array_values(array_filter(
                $data['social_links'],
                fn($item) =>
                !empty($item['platform']) && !empty($item['url'])
            ));
        }

        $company = CompanyDetail::first();

        if ($company) {
            $company->update($data);
        } else {
            CompanyDetail::create($data);
        }

        return back()->with('success', 'Company details updated successfully');
    }
}

