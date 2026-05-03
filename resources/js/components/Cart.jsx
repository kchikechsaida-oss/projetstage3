import React, { useState } from "react";

function Cart() {
    const [cart, setCart] = useState([]);

    // ajouter produit
    const addToCart = (produit) => {
        const exist = cart.find(item => item.id === produit.id);

        if (exist) {
            setCart(cart.map(item =>
                item.id === produit.id
                    ? { ...item, qty: item.qty + 1 }
                    : item
            ));
        } else {
            setCart([...cart, { ...produit, qty: 1 }]);
        }
    };

    // supprimer produit
    const removeFromCart = (id) => {
        setCart(cart.filter(item => item.id !== id));
    };

    // total
    const total = cart.reduce((sum, item) => sum + item.prix * item.qty, 0);

    return (
        <div className="container mt-5">
            
            <h2>Panier</h2>

            {/* produits (test) */}
            <button
                className="btn btn-primary m-2"
                onClick={() =>
                    addToCart({ id: 1, nom: "Produit 1", prix: 100 })
                }
            >
                Ajouter Produit 1
            </button>

            <button
                className="btn btn-success m-2"
                onClick={() =>
                    addToCart({ id: 2, nom: "Produit 2", prix: 200 })
                }
            >
                Ajouter Produit 2
            </button>

            <hr />

            <h4>Liste:</h4>

            {cart.map(item => (
                <div key={item.id} className="d-flex justify-content-between">
                    <span>{item.nom} (x{item.qty})</span>
                    <span>{item.prix * item.qty} DH</span>
                    <button
                        className="btn btn-danger btn-sm"
                        onClick={() => removeFromCart(item.id)}
                    >
                        X
                    </button>
                </div>
            ))}

            <hr />

            <h3>Total: {total} DH</h3>
        </div>
    );
}

export default Cart;


// export default function Cart() {
//     return <h1 style={{color:"green"}}>Panier khdam 💚</h1>;
// }

// export default function Cart() {
//     console.log("CART KHDAM");
//     return <h1>HELLO CART</h1>;
// }