<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->get();
        return view('members.index', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kartu' => 'required|unique:members',
            'nama' => 'required',
            'email' => 'required|email|unique:members',
            'no_hp' => 'required',
            'tipe_keanggotaan' => 'required',
            'alamat' => 'required',
        ]);

        Member::create($request->all());
        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nomor_kartu' => 'required|unique:members,nomor_kartu,' . $member->id,
            'nama' => 'required',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'no_hp' => 'required',
            'tipe_keanggotaan' => 'required',
            'alamat' => 'required',
        ]);

        $member->update($request->all());
        return redirect()->route('members.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus!');
    }

    public function card(Member $member)
    {
        return view('members.card', compact('member'));
    }
}