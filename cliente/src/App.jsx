import { useEffect, useState } from "react";

function App() {
  const [camiones, setCamiones] = useState([]);
  const [loading, setLoading] = useState(true);

  // Estados del formulario
  const [placa, setPlaca] = useState("");
  const [modelo, setModelo] = useState("");
  const [capacidad, setCapacidad] = useState("");
  const [operativo, setOperativo] = useState("1");

  // Cargar camiones
  useEffect(() => {
    fetch("http://localhost:8080/camiones")
      .then((res) => res.json())
      .then((data) => {
        setCamiones(data);
        setLoading(false);
      })
      .catch((err) => {
        console.error("Error al obtener camiones:", err);
        setLoading(false);
      });
  }, []);

  // Enviar nuevo camión (form-urlencoded)
  const handleSubmit = (e) => {
    e.preventDefault();

    const formData = new URLSearchParams();
    formData.append("placa", placa);
    formData.append("modelo", modelo);
    formData.append("capacidad", capacidad);
    formData.append("operativo", operativo);

    fetch("http://localhost:8080/camiones", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: formData.toString(),
    })
      .then((res) => {
        if (!res.ok) throw new Error("Error al insertar");
        return res.json();
      })
      .then((data) => {
        alert("Camión registrado!");
        setCamiones((prev) => [...prev, data]);

        // Limpiar formulario
        setPlaca("");
        setModelo("");
        setCapacidad("");
        setOperativo("1");
      })
      .catch((err) => {
        console.error(err);
        alert("Error al registrar el camión");
      });
  };

  if (loading) return <h2>Cargando...</h2>;

  return (
    <div style={{ padding: "20px" }}>
      <h1>Listado de Camiones</h1>

      {/* FORMULARIO PARA AGREGAR */}
      <h2>Registrar nuevo camión</h2>
      <form
        onSubmit={handleSubmit}
        style={{
          marginBottom: "20px",
          padding: "10px",
          border: "1px solid gray",
          width: "300px",
        }}
      >
        <label>Placa:</label>
        <input
          type="text"
          value={placa}
          onChange={(e) => setPlaca(e.target.value)}
          required
        />
        <br />

        <label>Modelo:</label>
        <input
          type="text"
          value={modelo}
          onChange={(e) => setModelo(e.target.value)}
          required
        />
        <br />

        <label>Capacidad (kg):</label>
        <input
          type="number"
          value={capacidad}
          onChange={(e) => setCapacidad(e.target.value)}
          required
        />
        <br />

        <label>Operativo:</label>
        <select
          value={operativo}
          onChange={(e) => setOperativo(e.target.value)}
        >
          <option value="1">Sí</option>
          <option value="0">No</option>
        </select>
        <br /><br />

        <button type="submit">Guardar</button>
      </form>

      {/* TABLA */}
      <table border="1" cellPadding="10" style={{ borderCollapse: "collapse" }}>
        <thead>
          <tr>
            <th>ID</th>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Capacidad (kg)</th>
            <th>Operativo</th>
          </tr>
        </thead>

        <tbody>
          {camiones.map((camion) => (
            <tr key={camion.camion_id}>
              <td>{camion.camion_id}</td>
              <td>{camion.placa}</td>
              <td>{camion.modelo}</td>
              <td>{camion.capacidad}</td>
              <td style={{ color: camion.operativo === "1" ? "green" : "red" }}>
                {camion.operativo === "1" ? "Sí" : "No"}
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default App;
