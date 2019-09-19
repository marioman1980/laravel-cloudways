<table>
	<thead>
		<th>
			Customer ID
		</th>
		<th>
			Email
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
			</tr>
		@endforeach
	</tbody>
</table>

<a href="test_customer_update/1722878984281">TEST</a>