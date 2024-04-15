<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Operator;
use App\Models\Specialization;
use App\Http\Requests\StoreOperatorRequest;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $operators = Operator::all();
        $specializzations = Specialization::all();
        /*$sponsorships = Sponsorship::all();*/
        return view('admin.operators.create', compact('operators', 'specializzations', /*"sponsorships"*/));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperatorRequest $request)
    {
        date_default_timezone_set("Europe/Rome");

        $user = auth()->user();
    
        // Verifica se l'utente ha già un operatore associato
        if ($user->operator) {
            return redirect()->back()->with('error', 'Hai già un operatore associato. Non puoi crearne un altro.');
        }
    
        // Se l'utente non ha un operatore associato, procedi con la creazione del nuovo operatore
        $validated = $request->validated();

        $file = "";
        $fileName = "";
        $filePath = "";

        if(isset($_FILES['file_upload']) && $_FILES["file_upload"]["size"] > 0){
            $file = $request->file('file_upload');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('uploads', 'public');
        }
    
        // Creazione di un nuovo operatore associato all'utente corrente
        $data = $request->all();
        $newOperator = new Operator();
        $newOperator->user_id = Auth::user()->id;
        $newOperator->name = $data["name"];
        $newOperator->engagement_price = $data["engagement_price"];
        $newOperator->description = $data["description"];
        $newOperator->phone = $data["phone"];
        $newOperator->filename = $fileName;
        $newOperator->original_name = $fileName;
        $newOperator->file_path = $filePath;
        $newOperator->address = $data["address"];
        $newOperator->foundation_year = $data["foundation_year"];
        $newOperator->save();
    
        // Se sono state fornite delle specializzazioni, le associate all'operatore appena creato
        if ($request->has('specializations')) {
            $newOperator->specializations()->attach($request->input('specializations'));
        }

        /*if($data["sponsorship"] != 0){
            $date = date("Y-m-d H:i:s");
            $sponsorship = Sponsorship::find($data["sponsorship"]);
            $duration = $sponsorship->duration;
            $object_date = date_create($date);
            $result = date_add($object_date, date_interval_create_from_date_string($duration));
            $newOperator->sponsorships()->attach($data["sponsorship"], [
                "start_date" => $date,
                "end_date" => $result
            ]);
        }*/
    
        return redirect()->route("admin.operators.index")->with('success', 'Operatore creato con successo.');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        date_default_timezone_set("Europe/Rome");
        
        $user = auth()->user();
        $operator = Operator::find($id);
    
        // Verifica se l'operatore appartiene all'utente corrente
        if ($user->id !== $operator->user_id) {
            return abort(403, 'Non hai il permesso per visualizzare questo operatore.');
        }

        $date = date("Y-m-d H:i:s");

        $how_much_operator_sponsorship = DB::table("operator_sponsorship")
        ->where("operator_id", "=", $id)
        ->where("end_date", ">", $date)
        ->count();

        $add_sponsorship = null;
        $end_sponsorship = null;
        $sponsorship = null;
        if($how_much_operator_sponsorship == 0){
            $add_sponsorship = true;
        }else{
            $add_sponsorship = false;
            $end_sponsorship = DB::table("operator_sponsorship")
            ->select("end_date", "sponsorship_id")
            ->where("operator_id", "=", $id)
            ->where("end_date", ">", $date)
            ->get();
            $sponsorship = DB::table("sponsorships")
            ->select("duration")
            ->where("id", "=", $end_sponsorship[0]->sponsorship_id)
            ->get();
        }
    
        return view('admin.operators.show', compact('operator', "add_sponsorship", "end_sponsorship", "sponsorship"));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        date_default_timezone_set("Europe/Rome");
        
        $user = auth()->user();
        $operator = Operator::findOrFail($id);
        $specializzations = Specialization::all();
        $sponsorships = Sponsorship::all();

        // Verifica se l'utente autenticato sta modificando il suo operatore, se l'id non corrisponde a quello dell'utente loggato porta alla pagina d'errore
        if ($user->operator->id !== $operator->id) {
            return redirect()->route('admin.error'); 
        }

        /*$date = date("Y-m-d H:i:s");

        $how_much_operator_sponsorship = DB::table("operator_sponsorship")
        ->where("operator_id", "=", $id)
        ->where("end_date", ">", $date)
        ->count();

        $add_sponsorship = null;
        $end_sponsorship = null;
        if($how_much_operator_sponsorship == 0){
            $add_sponsorship = true;
        }else{
            $add_sponsorship = false;
            $end_sponsorship = DB::table("operator_sponsorship")
            ->select("end_date")
            ->where("operator_id", "=", $id)
            ->where("end_date", ">", $date)
            ->get();
        }*/

    return view('admin.operators.edit', compact('operator', 'specializzations'/*, "add_sponsorship", "sponsorships", "end_sponsorship"*/));
    }


    public function update(Request $request, $id)
    {
        date_default_timezone_set("Europe/Rome");

        $request->validate([
            'name' => 'required|min:1|max:50',
            'engagement_price' => 'required|numeric|min:0',
            'description' => 'required|min:1|max:300',
            'phone' => 'required|min:1|max:50',
            "file_upload" => "mimes:jpg,png,jpeg|max:2048",
            'address' => 'required|min:1|max:50',
            'foundation_year' => 'required',
        ]);

        $operator = Operator::find($id);
        $data = $request->all();

        $file = "";
        $fileName = "";
        $filePath = "";

        if(!(isset($data["not_file"]))){
            $file = $operator->filename;
            $fileName = $operator->original_name;
            $filePath = $operator->file_path;
            if(isset($_FILES['file_upload']) && $_FILES["file_upload"]["size"] > 0){
                if(strlen($operator->file_path) > 0){
                    unlink("storage/".$operator->file_path);
                }
                $file = $request->file('file_upload');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('uploads', 'public');
            }
        }else{
            if(strlen($operator->file_path) > 0){
                unlink("storage/".$operator->file_path);
            }
        }

        $operator->user_id = Auth::user()->id;
        $operator->name = $data["name"];
        $operator->engagement_price = $data["engagement_price"];
        $operator->description = $data["description"];
        $operator->phone = $data["phone"];
        $operator->filename = $fileName;
        $operator->original_name = $fileName;
        $operator->file_path = $filePath;
        $operator->address = $data["address"];
        $operator->foundation_year = $data["foundation_year"];
        $operator->update();

        $operator->update($request->all());

       
        $operator->specializations()->sync($request->input('specializations', []));

        /*if($data["sponsorship"] != 0){
            $date = date("Y-m-d H:i:s");
            $sponsorship = Sponsorship::find($data["sponsorship"]);
            $duration = $sponsorship->duration;
            $object_date = date_create($date);
            $result = date_add($object_date, date_interval_create_from_date_string($duration));
            $operator->sponsorships()->attach($data["sponsorship"], [
                "start_date" => $date,
                "end_date" => $result
            ]);
        }*/

        return redirect()->route('admin.operators.show', $operator)->with('success', 'Operatore aggiornato con successo.');
    }

    public function destroy(Operator $operator)
    {
        if(strlen($operator->file_path) > 0){
            unlink("storage/".$operator->file_path);
        }
        $operator->delete();

        return redirect()->route('admin.operators.index')->with('success', 'Operatore eliminato con successo.');
    }

}

