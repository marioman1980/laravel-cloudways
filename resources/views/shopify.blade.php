<table>
	<thead>
		<th>
			Customer ID
		</th>
		<th>
			Email
		</th>
		<th>
			Order
		</th>
	</thead>
	<tbody>
		@foreach ($customers as $customer)
			<tr>
				<td>
					{{ $customer->node->id }}
				</td>
				<td>
					{{ $customer->node->email }}
				</td>
				<td>
					{{ $customer->node->lastOrder->name }}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

<a href="test_customer_update">TEST</a>